<?php

namespace App\Http\Controllers;

use App\Models\Potencial;
use Illuminate\Http\Request;

class PotencialController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Potenciales')->only("index","show");
        $this->middleware('can:Crear Potenciales')->only("create","store");
        $this->middleware('can:Editar Potenciales')->only("edit","update");
        $this->middleware('can:Eliminar Potenciales')->only("destroy");
    }
    
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
     * @param  \App\Models\Potencial  $potencial
     * @return \Illuminate\Http\Response
     */
    public function show(Potencial $potencial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Potencial  $potencial
     * @return \Illuminate\Http\Response
     */
    public function edit(Potencial $potencial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Potencial  $potencial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Potencial $potencial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Potencial  $potencial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Potencial $potencial)
    {
        //
    }
}
