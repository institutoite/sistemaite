<?php
use App\Models\Estado;
use App\Models\Persona;
use App\Models\Evento;
use App\Models\Mensaje;
use Carbon\Carbon;



    if (!function_exists('tiempoEnSegundos')) {
        function tiempoEnSegundos($tiempo)
        {
            list($minutos, $segundos) = explode(':', $tiempo);
            $carbon = Carbon::createFromTime(0, $minutos, $segundos);
            return $minutos * 60 + $carbon->second;
        }
    }

    if (!function_exists('estado')) {
        function estado($estado)
        {
            $estado = trim($estado);
            $estadoModel = Estado::where('estado', $estado)->first();
            if (!$estadoModel) {
                throw new \RuntimeException("Falta el estado: {$estado}. Regístrelo en la tabla estados.");
            }
            return $estadoModel->id;
        }
    }

    if (!function_exists('saludo')) {
        function saludo()
        {
            $hora = Carbon::now()->hour;
            $saludo = "";
            if ($hora < 12) {
                $saludo = "Buen día";
            } else {
                if ($hora < 18) {
                    $saludo = "Buenas tardes";
                } else {
                    $saludo = "Buenas noches";
                }
            }
            return $saludo;
        }
    }

    if (!function_exists('nombre')) {
        function nombre($persona_id, $modo = 1)
        {
            $persona = Persona::findOrFail($persona_id);
            $abreviatura = "";
            if (count($persona->hijos) > 0) {
                if ($persona->genero == "HOMBRE") {
                    $abreviatura = "Sr. Padre de Familia";
                }
                if ($persona->genero == "MUJER") {
                    $abreviatura = "Sra. Madre de Familia";
                }
            }
            $nombre = "";
            switch ($modo) {
                case 1:
                    $nombre = $abreviatura . ' *' . $persona->nombre;
                    break;

                case 2:
                    $nombre = $abreviatura . ' *' . $persona->nombre . ' ' . $persona->apellidop;
                    break;

                case 3:
                    $nombre = $abreviatura . ' *' . $persona->nombre . ' ' . $persona->apellidop . ' ' . $persona->apellidom;
                    break;

                default:
                    $nombre = $abreviatura . ' *' . $persona->nombre . ' ' . $persona->apellidop . ' ' . $persona->apellidom;
                    break;
            }
            return $nombre . "*";
        }
    }

    if (!function_exists('eventoSeleccionado')) {
        function eventoSeleccionado()
        {
            $evento = Evento::where('seleccionado', 1)->first();
            return $evento;
        }
    }

    if (!function_exists('idMensaje')) {
        function idMensaje($nombreMensaje)
        {
            return Mensaje::where('nombre', $nombreMensaje)->first()->id;
        }
    }

    if (!function_exists('TipoPeriodableCorto')) {
        function TipoPeriodableCorto($periodable_type_cadena)
        {
            $caracter = '\\';
            $pos = strripos($periodable_type_cadena, $caracter);
            $lon = strlen($periodable_type_cadena);
            $periodable_type = substr($periodable_type_cadena, $pos + 1, $lon - $pos);
            return $periodable_type;
        }
    }

    if (!function_exists('contactarsecretaria')) {
        function contactarsecretaria()
        {
            //return location();
        }
    }

    if (!function_exists('contactarguarderia')) {
        function contactarguarderia()
        {

        }
    }

    if (!function_exists('contactarprincipal')) {
        function contactarprincipal()
        {

        }
    }


?>