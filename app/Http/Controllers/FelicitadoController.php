<?php

namespace App\Http\Controllers;

use App\Models\Felicitado;
use App\Http\Requests\StoreFelicitadoRequest;
use App\Http\Requests\UpdateFelicitadoRequest;

class FelicitadoController extends Controller
{
    

    
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
     * @param  \App\Http\Requests\StoreFelicitadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFelicitadoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Felicitado  $felicitado
     * @return \Illuminate\Http\Response
     */
    public function show(Felicitado $felicitado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Felicitado  $felicitado
     * @return \Illuminate\Http\Response
     */
    public function edit(Felicitado $felicitado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFelicitadoRequest  $request
     * @param  \App\Models\Felicitado  $felicitado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFelicitadoRequest $request, Felicitado $felicitado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Felicitado  $felicitado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Felicitado $felicitado)
    {
        //
    }
}
