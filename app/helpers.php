<?php
use App\Models\Estado;
use App\Models\Persona;
use App\Models\Evento;
use Carbon\Carbon;
    function estado($estado){
            return Estado::where('estado',$estado)->get()->first()->id;
    }
    function saludo(){
        $hora=Carbon::now()->hour;
        $saludo="";
        if($hora<12){
            $saludo="Buen día";
        }else{
            if($hora<18){
                $saludo="Buenas tardes";
            }else{
                $saludo="Buenas noches";
            }
        }
        return $saludo;
    }
    
    function nombre($persona_id,$modo=1){
        $persona = Persona::findOrFail($persona_id);
        $abreviatura="";
        if(count($persona->hijos)>0){
            if($persona->genero=="HOMBRE"){
                $abreviatura="Sr. Padre de Familia"; 
            }
            if($persona->genero=="MUJER"){ 
                $abreviatura="Sra. Madre de Familia";
            }
        }
        $nombre="";
        switch ($modo) {
            case 1:
                $nombre=$abreviatura.' *'.$persona->nombre;
                break;
            
            case 2:
                $nombre=$abreviatura.' *'.$persona->nombre.' '.$persona->apellidop;
                break;
            
            case 3:
                $nombre=$abreviatura.' *'.$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom;
                break;
            
            default:
                $nombre=$abreviatura.' *'.$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom;
                break;
        }
        return $nombre."*";
    }

    function eventoSeleccionado(){
        $evento = Evento::where('seleccionado', 1)->first();
        return $evento;
    } 


?>