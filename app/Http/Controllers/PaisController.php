<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;
use App\Http\Requests\PaisStoreRequest;
use App\Http\Requests\PaisUpdateRequest;



class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('pais.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pais.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaisStoreRequest $request)
    {
        
        Pais::create($request->all());
        return redirect()->back()->with('mensaje','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show(Pais $pais)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit($pais)
    {
        $pais=Pais::findOrFail($pais);

     
        return view("pais.editar", ["pais" => $pais]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(PaisUpdateRequest $request, $id)
    {
        
        $pais_actualizado=Pais::findOrFail($id);
        $pais_actualizado->nombrepais=$request->nombrepais;
        $pais_actualizado->save();
        $Mensaje="Se actualizó correctamente el registro, Reviselo";

        return view('pais.mostrar',compact('pais_actualizado','Mensaje'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pais $pais)
    {
        //
    }
}
