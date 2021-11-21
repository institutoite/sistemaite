<?php

namespace App\Http\Controllers;

use App\Models\Computacion;
use App\Models\Persona;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        $computacion->carreras()->attach(array_keys($request->carreras));

        return redirect()->route('configuracion.gestionar.carreras',$computacion->persona->id);
    } 
}
