<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GContactController extends Controller
{
    private function buildGooglePersonPayload($nombre, $apellidop, $apellidom, $telefono, $email = null): array
    {
        $payload = [
            'names' => [
                [
                    'givenName' => (string) $nombre,
                    'familyName' => trim((string) $apellidop.' '.(string) $apellidom),
                ]
            ],
        ];

        if (!empty($telefono)) {
            $payload['phoneNumbers'] = [
                [
                    'value' => (string) $telefono,
                    'type' => 'mobile'
                ]
            ];
        }

        if (!empty($email)) {
            $payload['emailAddresses'] = [
                [
                    'value' => (string) $email,
                    'type' => 'home'
                ]
            ];
        }

        return $payload;
    }

    private function extractResourceAndEtag(array $person): ?array
    {
        $resourceName = data_get($person, 'resourceName');
        $etag = data_get($person, 'etag');

        if (empty($etag)) {
            $etag = data_get($person, 'metadata.sources.0.etag');
        }

        if (empty($resourceName) || empty($etag)) {
            return null;
        }

        return [$resourceName, $etag];
    }

    public function signIn(Request $request)
    {
        Session::put('previous_url', url()->previous());
        return Socialite::driver('google')
                        ->scopes(['https://www.googleapis.com/auth/contacts'])
                        ->with([
                            'access_type' => 'offline',
                            'prompt' => 'consent',
                        ])
                        ->redirect();
    }

    public function handleCallback(Request $request)
    {
        $returnUrl = Session::get('previous_url', '/');
        Session::forget('previous_url');
        $user = Socialite::driver('google')->user();
        $expirationTime = Carbon::now()->addSeconds($user->expiresIn);
        session(['GContactToken' => $user->token, 'GContactTokenExpiration' => $expirationTime]);
        return redirect($returnUrl);
    }

    public function getToken()
    {
        $token = Session::get('GContactToken');
        return $token;
    }

    public function resetTokenExpiration(){
        session(['GContactTokenExpiration' => '0:10']);
        return response()->json(["respuesta"=>"reseteado correctamente"]);
    }
    public function getTokenExpiration()
    {
        $tiempoString = session('GContactTokenExpiration');
        if (!$tiempoString) {
            return '0:00';
        }
        $now = Carbon::now();
        $segundosTranscurridos = $now->diffInSeconds($tiempoString);

        $minutos = floor($segundosTranscurridos / 60);
        $segundos = $segundosTranscurridos % 60;
        
        return sprintf('%02d:%02d', $minutos, $segundos);
    }
    
    public function createContact($nombre,$apellidop,$apellidom,$email,$telefono)
    {
        if (!$this->getToken()) {
            return null;
        }

        $contact = $this->buildGooglePersonPayload($nombre, $apellidop, $apellidom, $telefono, $email);
    
        try {
            $response = Http::withToken($this->getToken())
                ->timeout(20)
                ->post('https://people.googleapis.com/v1/people:createContact', $contact);

            if ($response->successful()) {
                $data = $this->extractResourceAndEtag($response->json());
                if (!$data) {
                    return null;
                }
                return $data;
            } else {
                Log::warning('No se pudo crear contacto en Google People API', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return null;
            }
        } catch (\Throwable $e) {
            Log::error('Error al crear contacto en Google People API', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function updateContact($nombre,$apellidop,$apellidom,$telefono,$resourseName,$etag,$email = null)
    {
        if (!$this->getToken() || empty($resourseName) || empty($etag)) {
            return null;
        }

        $contact = $this->buildGooglePersonPayload($nombre, $apellidop, $apellidom, $telefono, $email);
        $contact['resourceName'] = $resourseName;
        $contact['etag'] = $etag;

    try {
        $updateFields = 'names,phoneNumbers,emailAddresses';
        $url = 'https://people.googleapis.com/v1/'.$resourseName.':updateContact?updatePersonFields='.$updateFields;

        $response = Http::withToken($this->getToken())
            ->timeout(20)
            ->patch($url, $contact);

        if ($response->successful()) {
            $etag = data_get($response->json(), 'etag');
            if (!$etag) {
                $etag = data_get($response->json(), 'metadata.sources.0.etag');
            }

            if (!$etag) {
                return null;
            }

            return $etag;
        } else {
            Log::warning('No se pudo actualizar contacto en Google People API', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
            return null;
        }
    } catch (\Throwable $e) {
        Log::error('Error al actualizar contacto en Google People API', ['error' => $e->getMessage()]);
        return null;
    }
}
}
