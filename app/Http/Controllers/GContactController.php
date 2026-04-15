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
    public function signIn(Request $request)
    {
        Session::put('previous_url', url()->previous());
        return Socialite::driver('google')
                        ->scopes(['https://www.googleapis.com/auth/contacts'])
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

        $contact = [
            'names' => [
                [
                    'givenName' => $nombre,
                    'familyName' => $apellidop." ". $apellidom,
                ]
            ],
        ];

        if (!empty($telefono)) {
            $contact['phoneNumbers'] = [
                [
                    'value' => $telefono,
                    'type' => 'mobile'
                ]
            ];
        }
        if (!empty($email)) {
            $contact['emailAddresses'] = [
                [
                    'value' => $email,
                    'type' => 'home'
                ]
            ];
        }
    
        try {
            $response = Http::timeout(20)->post('https://gcontact.ite.com.bo/api/contact/create-contact', [
                'token' => $this->getToken(),
                'contacto' => $contact
            ]);
            if ($response->successful()) {
                //Guardar en BD user_id
                $resourceName= data_get($response->json(), 'data.resourceName');
                $etag= data_get($response->json(), 'data.etag');
                if (!$resourceName || !$etag) {
                    return null;
                }
                $data=[$resourceName,$etag];
                return $data;
            } else {
                Log::warning('No se pudo crear contacto en Google', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return null;
            }
        } catch (\Throwable $e) {
            Log::error('Error al crear contacto en Google', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function updateContact($nombre,$apellidop,$apellidom,$telefono,$resourseName,$etag,$email = null)
    {
        if (!$this->getToken() || empty($resourseName) || empty($etag)) {
            return null;
        }

        $contact = [
            'names' => [
                [
                    'givenName' => $nombre,
                    'familyName' => $apellidop." ".$apellidom,
                ]
            ],
        ];
        if (!empty($telefono)) {
            $contact['phoneNumbers'] = [
                [
                    'value' => $telefono,
                    'type' => 'mobile'
                ],
            ];
        }
        if (!empty($email)) {
            $contact['emailAddresses'] = [
                [
                    'value' => $email,
                    'type' => 'home'
                ]
            ];
        }

    try {
        $response = Http::timeout(20)->post('https://gcontact.ite.com.bo/api/contact/update-contact', [
            'token' => $this->getToken(),
            'resourceName'=>$resourseName,
            'etag'=>$etag,
            'contacto' => $contact
        ]);
        if ($response->successful()) {
            //Guardar el nuevo $etag=en la BD para la persona
            $etag= data_get($response->json(), 'data.etag');
            if (!$etag) {
                return null;
            }
             
            return $etag;
        } else {
            Log::warning('No se pudo actualizar contacto en Google', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
            return null;
        }
    } catch (\Throwable $e) {
        Log::error('Error al actualizar contacto en Google', ['error' => $e->getMessage()]);
        return null;
    }
}
}
