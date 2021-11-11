<?php

namespace App\Http\Controllers;

use App\Models\Computacion;
use Illuminate\Http\Request;

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

    public function agregar_carrera($estudiante){
        $Estudiante= Persona::findOrFail($persona);
        $idsNivelesDocente=Arr::pluck($Persona->docente->niveles, 'id');
        $nivelesTodos=Arr::pluck(Nivel::select('id')->get(),'id');
        $nivelesFaltantes=collect($nivelesTodos)->diff($idsNivelesDocente);
        $nivelesFaltantes=Nivel::whereIn('id',$nivelesFaltantes)->get();
        $nivelesDocente=Nivel::whereIn('id',$idsNivelesDocente)->get();
        return view('docente.niveles',compact('nivelesDocente','nivelesFaltantes','Persona'));
    }
}
