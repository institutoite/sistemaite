<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CalificacionGuardarRequest;
use App\Models\Calificacion;
use App\Models\Persona;
use Illuminate\Support\Facades\Auth;

class CalificacionController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalificacionGuardarRequest $request)
    {
        $calificacion= new Calificacion();
        $calificacion->calificacion=$request->calificacion;
        $calificacion->persona_id=$request->persona_id;
        $calificacion->user_id=Auth::user()->id;
        $calificacion->save();  
        $persona=Persona::findOrFail($request->persona_id);
        return redirect()->route('personas.show', $persona->id);//->withErrors($validator)->withInput();ç
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $persona= Persona::find($request->persona_id);
        $calificacion=$persona->calificaciones->where('user_id',Auth::user()->id)->first();
        return response()->json(['calificacion'=>$calificacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $calificacion=Calificacion::findOrFail($request->calificacion_id);
        $calificacion->calificacion=$request->calificacion;
        $calificacion->save();
        $persona=$calificacion->persona;
        
        return redirect()->route('personas.show',$persona);
        // return response()->json(['calificacion'=>"Guardado correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
