<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use App\Http\Requests\PaisStoreRequest;
use App\Http\Requests\PaisUpdateRequest;
use Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Departamento;


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
        $pais=new Pais();
        $pais->nombrepais=$request->nombrepais;
        $pais->save();
        $pais->usuario()->attacha(Auth::user()->id);
        return redirect()->route('paises.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais=Pais::findOrFail($id);
        $user=$pais->usuario->first();
        return view('pais.mostrar',compact('pais','user'));
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
        
        $pais=Pais::findOrFail($id);
        $pais->nombrepais=$request->nombrepais;
        $pais->save();
        $Mensaje="Se actualizó correctamente el registro, Reviselo";

        return redirect()->route('paises.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais = Pais::findOrFail($id);
        $pais->delete();
        return redirect()->back()->with('mensaje','Registro eliminado Correctamente');
    }
    public function eliminarPais($id) {
        $pais = Pais::findOrFail($id);
        $pais->delete();
        return response()->json(['message' => 'Registro Eliminado','status'=>200]); 
    }

    public function departamento_de_pais(Request $request,$id){
        // return response()->json(['e'=>$id]);  
        if($request->ajax()){
            return Departamento::where('pais_id',$id)->get();      
        }
    } 
}
