<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Models\Ciudad;
use App\Models\Pais;
use Illuminate\Http\Request;

use App\Http\Requests\ZonaStoreRequest;
use App\Http\Requests\ZonaUpdateRequest;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ZonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Zonas')->only("index","show");
        $this->middleware('can:Crear Zonas')->only("create","store");
        $this->middleware('can:Editar Zonas')->only("update","edit");
        $this->middleware('can:Eliminar Zonas')->only("destroy");
    }
    
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
        
        $zonaNueva=new Zona();
        $zonaNueva->zona=$request->zona;
        $zonaNueva->ciudad_id=$request->ciudad_id;
        $zonaNueva->save();
        $zonaNueva->usuarios()->attach(Auth::user()->id);
        return redirect()->route('zonas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function show(Zona $zona)
    {
        //if (isset($zona->userable))
        $user=$zona->usuarios->first();
        return view('zona.mostrar',compact('zona','user'));
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
        return view('zona.editar', compact('ciudades','zona'));
        
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
        return view('zona.index',compact('ciudad','Mensaje','zona'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zona $zona)
    {
        $zona->delete();
        return response()->json(['mensaje'=>'El registro fue eliminado correctamente']);
    }
    public function zona_of_city(Request $request,$id){  
        
        if($request->ajax()){
            return Zona::where('ciudad_id',$id)->get();      
        }
    } 
}
