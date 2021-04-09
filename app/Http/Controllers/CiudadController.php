<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Pais;
use App\Zona;
use Illuminate\Http\Request;

use App\Http\Requests\CiudadStoreRequest;
use App\Http\Requests\CiudadUpdateRequest;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ciudad.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises=Pais::get();
        return view('ciudad.crear',compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CiudadStoreRequest $request)
    {
        Ciudad::create($request->all());
        return redirect()->back()->with('mensaje','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $ciudad=Ciudad::findOrFail($id);
        
        $pais=Pais::findOrFail($ciudad->pais_id);
        
        return view('ciudad.mostrar',compact('ciudad','pais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $paises=Pais::get();
        $ciudad=Ciudad::findOrFail($id);
        
        //dd($ciudad);
        return view("ciudad.editar", ["ciudad" => $ciudad,'paises'=>$paises]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function update(CiudadUpdateRequest $request, $id)
    {
        $ciudad=Ciudad::findOrFail($id);

        $ciudad->ciudad=$request->ciudad;
        $ciudad->pais_id=$request->pais_id;
        $ciudad->save();
        
        $pais=Pais::findOrFail($request->pais_id);
        
        $Mensaje="Se actualizó correctamente el registro, Reviselo";
        return view('ciudad.mostrar',compact('ciudad','Mensaje','pais'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudad $ciudad)
    {
        
    }
    public function eliminarCiudad($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return response()->json(['message' => 'Registro Eliminado','status'=>200]); 
    }
    public function city_of_country(Request $request,$id){  
        
        if($request->ajax()){
            return Ciudad::where('pais_id',$id)->get();      
        }
    } 

    public function getZonas(Request $request,$id){
        //if($request->ajax()){
            $zona=Zona::zonas($id);
            dd($zona);
            return response()->json($zona);
       // }
    }
}

