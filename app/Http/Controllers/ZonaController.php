<?php

namespace App\Http\Controllers;

use App\Zona;
use App\Ciudad;
use App\Pais;
use Illuminate\Http\Request;

use App\Http\Requests\ZonaStoreRequest;
use App\Http\Requests\ZonaUpdateRequest;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('zona.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades=Ciudad::get();
        $paises=Pais::get();
        return view('zona.crear',compact('ciudades','paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZonaStoreRequest $request)
    {
        //dd($request->all());
        $zonaNueva=new Zona();
        $zonaNueva->zona=$request->zona;
        $zonaNueva->ciudad_id=$request->ciudad_id;
        $zonaNueva->save();
        return redirect()->back()->with('mensaje','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function show(Zona $zona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zona=Zona::findOrFail($id);
        $ciudades=Ciudad::get();
        $paises=Pais::get();
        return view('zona.editar',compact('ciudades','paises','zona'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function update(ZonaUpdateRequest $request, $id)
    {
        $zona=Zona::findOrFail($id);
        $zona->zona=$request->zona;
        $zona->ciudad_id=$request->ciudad_id;
        $zona->save();
        $ciudad=Ciudad::findOrFail($request->ciudad_id);
        $Mensaje="Se actualizó correctamente el registro, Reviselo";
        return view('zona.mostrar',compact('ciudad','Mensaje','zona'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zona $zona)
    {
        //
    }
    public function zona_of_city(Request $request,$id){  
        
        if($request->ajax()){
            return Zona::where('ciudad_id',$id)->get();      
        }
    } 
}
