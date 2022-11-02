<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Interest;
use App\Models\Persona;

use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use App\Http\Requests\ReportePotencialesBetween;

class PersonaReporteController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Listar Reportepersona')->only("potencialesPorInteresView","potencialesHoyView","potencialesBetweenView","potencialesPorInteres","potencialesDeHoy","potencialesBetween");;
        // $this->middleware('can:Ver Reporte Personas')->
    }
    
    public function potencialesPorInteresView(){
        $interests=Interest::all();
        return view('reportes.potenciales_por_interest', compact('interests'));
    }
    public function potencialesHoyView(){
        return view('reportes.potenciales_de_hoy');
    }
    public function potencialesBetweenView(){

        return view('reportes.potenciales_between_form');
    }


    public function potencialesPorInteres(Request $request){
        $potenciales=Persona::join('observacions','observacions.observable_id','personas.id')
        ->join('interest_persona','interest_persona.persona_id','personas.id')
        ->join('interests','interest_persona.interest_id','interests.id')
        ->join('userables','userables.userable_id','personas.id')
        ->join('users','users.id','userables.user_id') 
        ->where('observacions.observable_type',Persona::class)
        ->where('userables.userable_type',Persona::class)
        ->where('votos',1)
        ->where('habilitado',0)
        ->select('personas.id','nombre','apellidop','telefono','observacions.observacion','interest','personas.created_at','name')
        ->get();
        return DataTables::of($potenciales)
                ->rawColumns(['observacion'])
                ->toJson();
    }
    public function potencialesDeHoy(){
        $potenciales=Persona::join('observacions','observacions.observable_id','personas.id')
        ->join('interest_persona','interest_persona.persona_id','personas.id')
        ->join('interests','interest_persona.interest_id','interests.id')
        ->join('userables','userables.userable_id','personas.id')
        ->join('users','users.id','userables.user_id') 
        ->where('observacions.observable_type',Persona::class)
        ->where('votos',1)
        ->where('habilitado',0)
        ->whereRaw('Date(personas.created_at) = CURDATE()')
        ->select('personas.id','nombre','apellidop','telefono','observacions.observacion','interest','personas.created_at','name')
        ->get();
        return DataTables::of($potenciales)
                ->rawColumns(['observacion'])
                ->toJson();
    }
    public function potencialesBetween(ReportePotencialesBetween $request){
        $potenciales=Persona::join('observacions','observacions.observable_id','personas.id')
        ->join('interest_persona','interest_persona.persona_id','personas.id')
        ->join('interests','interest_persona.interest_id','interests.id')
        ->join('userables','userables.userable_id','personas.id')
        ->join('users','users.id','userables.user_id') 
        ->where('observacions.observable_type',Persona::class)
        ->where('votos',1)
        ->where('habilitado',0)
        ->whereBetween('personas.created_at', [$request->fechaini, $request->fechafin])
        ->select('personas.id','nombre','apellidop','telefono','observacions.observacion','interest','personas.created_at','name')
        ->get();
        return view('reportes.potenciales_between',compact('potenciales'));
    }


    

}
