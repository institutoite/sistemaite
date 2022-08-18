<?php

namespace App\Http\Controllers;

use App\Models\Computacion;
use App\Models\Persona;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class ComputacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('computacion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Computacion  $computacion
     * @return \Illuminate\Http\Response
     */
    public function show(Computacion $computacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Computacion  $computacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Computacion $computacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Computacion  $computacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Computacion $computacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Computacion  $computacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computacion $computacion)
    {
        $computacion->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }

    public function mostrar_carreras($persona){
        
        $Persona= Persona::findOrFail($persona);
        $idsCarreras=Arr::pluck($Persona->computacion->carreras, 'id');
        $CarrerasTodos=Arr::pluck(Carrera::select('id')->get(),'id');
        $CarrerasFaltantes=collect($CarrerasTodos)->diff($idsCarreras);
        $CarrerasFaltantes=Carrera::whereIn('id',$CarrerasFaltantes)->get();
        $CarrerasComputacion=Carrera::whereIn('id',$idsCarreras)->get();
        return view('computacion.carrerasconfig',compact('CarrerasComputacion','CarrerasFaltantes','Persona'));
    }

    public function GuardarNuevaCarrera(Request $request,$computacion) {
        
        $computacion = Persona::findOrFail($computacion)->computacion;
        $persona=$computacion->persona;
        $estudiante=$persona->estudiante;
        if(!empty($request->carreras)){
            $computacion->carreras()->attach(array_keys($request->carreras));
            $carrera=$computacion->carreras->last();
            return redirect()->route('matriculacion.create',['computacion'=>$computacion->id,'carrera'=>$carrera->id]);
        }
        else{
            return view('opcion.principal', compact('persona','estudiante'));
        }  
        //return redirect()->route('configuracion.gestionar.carreras',$computacion->persona->id);
    } 

    public function computacionsFaltones()
    {
        $faltonescom=Persona::join('computacions','personas.id','computacions.persona_id')
                ->join('matriculacions','matriculacions.computacion_id','computacions.id')
                ->join('programacioncoms','programacioncoms.matriculacion_id','matriculacions.id')
                ->join('estados','estados.id','programacioncoms.estado_id')
                ->where('estados.estado','FALTA')
                ->select('nombre','apellidop','apellidom','telefono')
                ->get();
        return DataTables::of($faltonescom)
        ->addColumn('btn','estudiantes.actionfaltones')
        ->rawColumns(['btn'])
        ->toJson(); 
    }
}
