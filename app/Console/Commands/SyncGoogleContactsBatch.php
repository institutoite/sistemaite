<?php

namespace App\Console\Commands;

use App\Models\Persona;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SyncGoogleContactsBatch extends Command
{
    protected $signature = 'gcontact:sync-batch
        {--token= : Access token OAuth de Google}
        {--batch=1000 : Cantidad máxima de personas a procesar}
        {--only-pending : Procesar solo cola pendiente}
        {--from-id=0 : Procesar desde este id en adelante}';

    protected $description = 'Sincroniza contactos con Google People API por lotes (solo personas con telefono valido).';

    private function hasQueueColumns(): bool
    {
        return Schema::hasColumn('personas', 'gcontact_sync_pending')
            && Schema::hasColumn('personas', 'gcontact_sync_error')
            && Schema::hasColumn('personas', 'gcontact_sync_attempts')
            && Schema::hasColumn('personas', 'gcontact_sync_last_attempt_at');
    }

    private function normalizePhone(?string $phone): ?string
    {
        $digits = preg_replace('/\D+/', '', (string) $phone);
        if ($digits === '' || preg_match('/^0+$/', $digits)) {
            return null;
        }

        if (Str::startsWith($digits, '591')) {
            $digits = substr($digits, 3);
        }

        if (strlen($digits) < 8) {
            return null;
        }

        return $digits;
    }

    private function markState(Persona $persona, bool $ok, ?string $error = null): void
    {
        if (!$this->hasQueueColumns()) {
            return;
        }

        $persona->gcontact_sync_pending = !$ok;
        $persona->gcontact_sync_error = $ok ? null : Str::limit((string) $error, 2000, '');
        $persona->gcontact_sync_attempts = (int) ($persona->gcontact_sync_attempts ?? 0) + 1;
        $persona->gcontact_sync_last_attempt_at = now();
    }

    private function buildPayload(Persona $persona, string $phone): array
    {
        return [
            'names' => [[
                'givenName' => (string) $persona->nombre,
                'familyName' => trim((string) $persona->apellidop.' '.(string) $persona->apellidom),
            ]],
            'phoneNumbers' => [[
                'value' => $phone,
                'type' => 'mobile',
            ]],
        ];
    }

    public function handle(): int
    {
        $token = (string) ($this->option('token') ?: env('GOOGLE_CONTACT_TOKEN', ''));
        if ($token === '') {
            $this->error('Debes enviar --token o definir GOOGLE_CONTACT_TOKEN en .env');
            return self::FAILURE;
        }

        $batch = max(1, (int) $this->option('batch'));
        $fromId = max(0, (int) $this->option('from-id'));
        $onlyPending = (bool) $this->option('only-pending');
        $hasQueue = $this->hasQueueColumns();

        $query = Persona::query()
            ->select('id', 'nombre', 'apellidop', 'apellidom', 'telefono', 'resourseName', 'etag')
            ->where('id', '>=', $fromId)
            ->whereNotNull('telefono')
            ->where('telefono', '<>', '')
            ->where('telefono', '<>', '0');

        if ($onlyPending && $hasQueue) {
            $query->where('gcontact_sync_pending', 1);
        } else {
            $query->where(function ($q) use ($hasQueue) {
                $q->whereNull('resourseName')
                    ->orWhereNull('etag')
                    ->orWhere('resourseName', '')
                    ->orWhere('etag', '');

                if ($hasQueue) {
                    $q->orWhere('gcontact_sync_pending', 1);
                }
            });
        }

        $personas = $query->orderBy('id')->limit($batch)->get();
        if ($personas->isEmpty()) {
            $this->info('No hay personas pendientes para sincronizar con los filtros actuales.');
            return self::SUCCESS;
        }

        $okCount = 0;
        $failCount = 0;
        $skipCount = 0;

        $this->info('Procesando '.$personas->count().' personas...');

        foreach ($personas as $persona) {
            $phone = $this->normalizePhone((string) $persona->telefono);
            if (!$phone) {
                $skipCount++;
                if ($hasQueue) {
                    $this->markState($persona, false, 'Telefono invalido para sincronizacion.');
                    $persona->saveQuietly();
                }
                continue;
            }

            try {
                if (empty($persona->resourseName) || empty($persona->etag)) {
                    $payload = $this->buildPayload($persona, $phone);
                    $response = Http::withToken($token)
                        ->timeout(20)
                        ->post('https://people.googleapis.com/v1/people:createContact', $payload);

                    if ($response->successful()) {
                        $data = $response->json();
                        $resourceName = data_get($data, 'resourceName');
                        $etag = data_get($data, 'etag') ?: data_get($data, 'metadata.sources.0.etag');

                        if ($resourceName && $etag) {
                            $persona->resourseName = $resourceName;
                            $persona->etag = $etag;
                            $this->markState($persona, true);
                            $persona->saveQuietly();
                            $okCount++;
                        } else {
                            $this->markState($persona, false, 'Respuesta de Google sin resourceName/etag.');
                            $persona->saveQuietly();
                            $failCount++;
                        }
                    } else {
                        $this->markState($persona, false, 'Google createContact '.$response->status().': '.$response->body());
                        $persona->saveQuietly();
                        $failCount++;
                    }
                } else {
                    $payload = $this->buildPayload($persona, $phone);
                    $payload['resourceName'] = $persona->resourseName;
                    $payload['etag'] = $persona->etag;

                    $url = 'https://people.googleapis.com/v1/'.$persona->resourseName.':updateContact?updatePersonFields=names,phoneNumbers';
                    $response = Http::withToken($token)
                        ->timeout(20)
                        ->patch($url, $payload);

                    if ($response->successful()) {
                        $etag = data_get($response->json(), 'etag') ?: data_get($response->json(), 'metadata.sources.0.etag');
                        if ($etag) {
                            $persona->etag = $etag;
                        }
                        $this->markState($persona, true);
                        $persona->saveQuietly();
                        $okCount++;
                    } else {
                        $this->markState($persona, false, 'Google updateContact '.$response->status().': '.$response->body());
                        $persona->saveQuietly();
                        $failCount++;
                    }
                }
            } catch (\Throwable $e) {
                $this->markState($persona, false, $e->getMessage());
                $persona->saveQuietly();
                $failCount++;
            }
        }

        $this->info("Sincronizacion finalizada. OK: {$okCount}, Fallidos: {$failCount}, Omitidos: {$skipCount}");
        return self::SUCCESS;
    }
}

