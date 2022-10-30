<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Pais;
use App\Models\Zona;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Requests\CiudadStoreRequest;
use App\Http\Requests\CiudadUpdateRequest;

class CiudadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Ciudades')->only('index','show');
        $this->middleware('can:Crear Ciudades')->only('create','store');
        $this->middleware('can:Editar Ciudades')->only('edit','update');
        $this->middleware('can:Eliminar Ciudades')->only('destroy');
    }
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
        //Ciudad::create($request->all());
        $ciudad= new Ciudad();
        $ciudad->ciudad=$request->ciudad;
        $ciudad->pais_id = $request->pais_id;

        $ciudad->save();
        $ciudad->usuarios()->attach(Auth::user()->id);
        return view('ciudad.index');
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
        $user=$ciudad->usuarios->first();
        return view('ciudad.mostrar',compact('ciudad','pais','user'));
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
           // dd($zona);
            return response()->json($zona);
       // }
    }
}

