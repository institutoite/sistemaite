<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
//use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class GContactController extends Controller
{
    public function signIn()
    {
        return Socialite::driver('google')->scopes(['https://www.googleapis.com/auth/contacts'])->redirect();
    }

    public function handleCallback()
    {
                $user = Socialite::driver('google')->user();
                $expirationTime = Carbon::now()->addSeconds($user->expiresIn);
                session(['GContactToken' => $user->token, 'GContactTokenExpiration' => $expirationTime]);
                
                
                //return redirect()->route($unaRuta);
                
    }

    public function getToken()
    {
        $token = Session::get('GContactToken');
        return $token;
    }

    public function getTokenExpiration()
    {
        $expiration = session('GContactTokenExpiration');
        if (!$expiration) {
            return 0;
        }
        $minutesRemaining = Carbon::now()->diffInMinutes($expiration);
        return $minutesRemaining;
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
            $response = Http::post('http://localhost:4000/api/contact/create-contact', [
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
        $response = Http::post('http://localhost:4000/api/contact/update-contact', [
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

    

    public function logout()
    {
        Session::forget('GContactToken');
    }
}