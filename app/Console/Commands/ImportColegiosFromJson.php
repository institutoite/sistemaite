<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Colegio;

class ImportColegiosFromJson extends Command
{
    protected $signature = 'colegios:import {path : Carpeta con archivos .json}';

    protected $description = 'Importa colegios desde archivos JSON por departamento';

    public function handle(): int
    {
        $path = $this->argument('path');

        if (!File::isDirectory($path)) {
            $this->error('La ruta no es una carpeta válida: '.$path);
            return self::FAILURE;
        }

        $archivos = [
            'colegios_beni.json',
            'colegios_chuquisaca.json',
            'colegios_cochabamba.json',
            'colegios_lapaz.json',
            'colegios_oruro.json',
            'colegios_pando.json',
            'colegios_potosi.json',
            'colegios_santacruz.json',
            'colegios_tarija.json',
        ];

        $files = collect($archivos)
            ->map(fn ($name) => $path.DIRECTORY_SEPARATOR.$name)
            ->filter(fn ($filePath) => File::exists($filePath))
            ->map(fn ($filePath) => new \SplFileInfo($filePath))
            ->values();

        if ($files->isEmpty()) {
            $this->warn('No se encontraron archivos .json en la carpeta indicada.');
            return self::SUCCESS;
        }

        $inserted = 0;
        $updated = 0;
        $skipped = 0;

        foreach ($files as $file) {
            $content = File::get($file->getRealPath());
            $items = json_decode($content, true);

            if (!is_array($items)) {
                $this->warn('JSON inválido: '.$file->getFilename());
                continue;
            }

            foreach ($items as $item) {
                $general = $item['general'] ?? [];
                $ubicacion = $item['ubicacion'] ?? [];
                $coordenadas = $ubicacion['coordenadas'] ?? [];

                $rue = trim((string) ($general['codigo_rue'] ?? ''));
                if ($rue === '') {
                    $skipped++;
                    continue;
                }

                $telefono = $general['telefonos'] ?? null;
                $nombre = $general['nombre'] ?? null;

                $data = [
                    'nombre' => $nombre,
                    'rue' => $rue,
                    'director' => $general['director'] ?? null,
                    'direccion' => $general['direccion'] ?? null,
                    'telefono' => $telefono,
                    'celular' => null,
                    'dependencia' => $general['dependencia'] ?? null,
                    'nivel' => $general['niveles'] ?? null,
                    'turno' => $general['turnos'] ?? null,
                    'humanistico' => $general['humanistico'] ?? null,
                    'departamento' => $ubicacion['departamento'] ?? 'SIN DATOS',
                    'provincia' => $ubicacion['provincia'] ?? 'SIN DATOS',
                    'municipio' => $ubicacion['municipio'] ?? 'SIN DATOS',
                    'distrito' => $ubicacion['distrito'] ?? null,
                    'areageografica' => $ubicacion['area'] ?? null,
                    'coordenadax' => isset($coordenadas['latitud']) ? (string) $coordenadas['latitud'] : null,
                    'coordenaday' => isset($coordenadas['longitud']) ? (string) $coordenadas['longitud'] : null,
                    'latitud' => isset($coordenadas['latitud']) ? (float) $coordenadas['latitud'] : null,
                    'longitud' => isset($coordenadas['longitud']) ? (float) $coordenadas['longitud'] : null,
                    'coordenadas_texto' => $coordenadas['texto'] ?? null,
                    'url' => $item['url'] ?? null,
                ];

                $exists = Colegio::where('rue', $rue)->exists();
                $colegio = Colegio::updateOrCreate(['rue' => $rue], $data);
                $exists ? $updated++ : $inserted++;

                // Infraestructura
                $infra = $item['infraestructura'] ?? [];
                $servicios = $infra['servicios'] ?? [];
                $ambientes = $infra['ambientes'] ?? [];

                DB::table('colegio_infraestructura')->updateOrInsert(
                    ['colegio_id' => $colegio->id],
                    [
                        'agua' => $servicios['agua'] ?? null,
                        'electricidad' => $servicios['electricidad'] ?? null,
                        'banos' => $servicios['banos'] ?? null,
                        'internet' => $servicios['internet'] ?? null,
                        'aulas' => $ambientes['aulas'] ?? null,
                        'laboratorios' => $ambientes['laboratorios'] ?? null,
                        'bibliotecas' => $ambientes['bibliotecas'] ?? null,
                        'computacion' => $ambientes['computacion'] ?? null,
                        'canchas' => $ambientes['canchas'] ?? null,
                        'gimnasios' => $ambientes['gimnasios'] ?? null,
                        'coliseos' => $ambientes['coliseos'] ?? null,
                        'piscinas' => $ambientes['piscinas'] ?? null,
                        'secretaria' => $ambientes['secretaria'] ?? null,
                        'reuniones' => $ambientes['reuniones'] ?? null,
                        'talleres' => $ambientes['talleres'] ?? null,
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );

                // Estadísticas
                $estadisticas = $item['estadisticas'] ?? [];
                foreach ($estadisticas as $tipo => $porSexo) {
                    if (!is_array($porSexo)) {
                        continue;
                    }
                    foreach ($porSexo as $sexo => $porAnio) {
                        if (!is_array($porAnio)) {
                            continue;
                        }
                        foreach ($porAnio as $anio => $valor) {
                            if (!is_numeric($anio)) {
                                continue;
                            }
                            DB::table('colegio_estadisticas')->updateOrInsert(
                                [
                                    'colegio_id' => $colegio->id,
                                    'tipo' => $tipo,
                                    'sexo' => $sexo,
                                    'anio' => (int) $anio,
                                ],
                                [
                                    'valor' => is_numeric($valor) ? (int) $valor : null,
                                    'updated_at' => now(),
                                    'created_at' => now(),
                                ]
                            );
                        }
                    }
                }
            }
        }

        $this->info("Importación finalizada. Insertados: {$inserted}, Actualizados: {$updated}, Omitidos: {$skipped}");
        return self::SUCCESS;
    }
}
