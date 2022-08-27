<?php

namespace App\Http\Controllers;

use App\Models\Mensajeado;
use App\Http\Requests\StoreMensajeadoRequest;
use App\Http\Requests\UpdateMensajeadoRequest;
use App\Http\Controllers\EventoController;


class MensajeadoController extends Controller
{
    
    public function storeMensajeado(StoreMensajeadoRequest $request){
        $eventoObjeto = new EventoController();
        $evento = eventoSeleccionado();
        $mensajeado= new Mensajeado();
        $mensajeado->persona_id = $request->persona_id;
        $mensajeado->evento_id= $evento->id;
        $mensajeado->save();
        //$eventoObjeto->seleccionarEvento($evento_id);
        return response()->json(['mensaje'=>"Mensajeado guardo Correctamente"]);
    }

   
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreMensajeadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMensajeadoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensajeado  $mensajeado
     * @return \Illuminate\Http\Response
     */
    public function show(Mensajeado $mensajeado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mensajeado  $mensajeado
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensajeado $mensajeado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMensajeadoRequest  $request
     * @param  \App\Models\Mensajeado  $mensajeado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMensajeadoRequest $request, Mensajeado $mensajeado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensajeado  $mensajeado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensajeado $mensajeado)
    {
        //
    }

}
