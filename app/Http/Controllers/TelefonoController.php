<?php

namespace App\Http\Controllers;

use App\Telefono;
use App\Persona;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Persona $persona)
    {
        if (request()->ajax()) {
            $datos =datatables()->of(Telefono::select('id', 'numero', 'parentesco')->where('persona_id', '=', $persona->id))
            ->addColumn('btn', 'user.action')
            ->rawColumns(['btn', 'icono'])
            ->toJson();    
            return $datos;
        }
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function show(Telefono $telefono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function edit(Telefono $telefono)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telefono $telefono)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function destroy(Telefono $telefono)
    {
        //
    }
}
