<?php

namespace App\Http\Controllers;

use App\Models\Caracteristica;
use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCaracteristicaRequest;

class CaracteristicaController extends Controller
{
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
     * @param  \App\Http\Requests\StoreCaracteristicaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCaracteristicaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caracteristica  $caracteristica
     * @return \Illuminate\Http\Response
     */
    public function show(Caracteristica $caracteristica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caracteristica  $caracteristica
     * @return \Illuminate\Http\Response
     */
    public function edit(Caracteristica $caracteristica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCaracteristicaRequest  $request
     * @param  \App\Models\Caracteristica  $caracteristica
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCaracteristicaRequest $request, Caracteristica $caracteristica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caracteristica  $caracteristica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caracteristica $caracteristica)
    {
        //
    }
}
