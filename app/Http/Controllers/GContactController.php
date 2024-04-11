<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Exception;
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
        session(['GContactTokenExpiration' => '01:15']);
        return response()->json(["respuesta"=>"reseteado correctamente"]);
    }
    public function getTokenExpiration()
    {
        $tiempoString = session('GContactTokenExpiration');
        if (!$tiempoString) {
            return '0:10';
        }
        $now = Carbon::now();
        $segundosTranscurridos = $now->diffInSeconds($tiempoString);

        $minutos = floor($segundosTranscurridos / 60);
        $segundos = $segundosTranscurridos % 60;
        return sprintf('%02d:%02d', $minutos, $segundos);
    }
    
    public function createContact($nombre,$apellidop,$apellidom,$email,$telefono)
    {
    
        $contact = [
            'names' => [
                [
                    'givenName' => $nombre,
                    'familyName' => $apellidop." ". $apellidom,
                ]
            ],
            'phoneNumbers' => [
                [
                    'value' => $telefono,
                    'type' => 'mobile'
                ]
            ],
            'emailAddresses' => [
                [
                    'value' => $email,
                    'type' => 'home'
                ]
            ],
        ];
    
        try {
            $response = Http::post('https://gcontact.ite.com.bo/api/contact/create-contact', [
                'token' => $this->getToken(),
                'contacto' => $contact
            ]);
            if ($response->successful()) {
                
                
                //Guardar en BD user_id
                $resourceName= $response['data']['resourceName'];
	            $etag= $response['data']['etag'];
                $data=[$resourceName,$etag];
                return $data;
            } else {
                return response()->json(['message' => 'Error al crear el contacto.'], $response->status());
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al procesar la solicitud.'], 500);
        }
    }

    public function updateContact($nombre,$apellidop,$apellidom,$telefono,$resourseName,$etag)
    {
        $contact = [
            'names' => [
                [
                    'givenName' => $nombre,
                    'familyName' => $apellidop." ".$apellidom,
                ]
            ],
            'phoneNumbers' => [
                [
                    'value' => $telefono,
                    'type' => 'mobile'
                ],
            ],
            'emailAddresses' => [
                [
                    'value' => "main@gmail.com",
                    'type' => 'home'
                ]
            ]
        ];

    try {
        $response = Http::post('https://gcontact.ite.com.bo/api/contact/update-contact', [
            'token' => $this->getToken(),
            'resourceName'=>$resourseName,
            'etag'=>$etag,
            'contacto' => $contact
        ]);
        if ($response->successful()) {
            //Guardar el nuevo $etag=en la BD para la persona
	        $etag= $response['data']['etag'];
            
            return $etag;
        } else {
            return response()->json(['message' => 'Error al actualizar el contacto.'], $response->status());
        }
    } catch (Exception $e) {
        return response()->json(['message' => 'Error al procesar la solicitud.'], 500);
    }
}
}