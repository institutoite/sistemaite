<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CalificacionGuardarRequest;
use App\Models\Calificacion;
use App\Models\Persona;
use Illuminate\Support\Facades\Auth;

class CalificacionController extends Controller
{
    public function __construct(){
        $this->middleware('can:Crear Calificacion')->only('store');
        $this->middleware('can:Editar Calificacion')->only('edit','update','getCalificacion','setCalificacion');
    }
    
    
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

    public function edit(Request $request)
    {
        $persona= Persona::find($request->persona_id);
        $calificacion=$persona->calificaciones->where('user_id',Auth::user()->id)->first();
        return response()->json(['calificacion'=>$calificacion]);
    }

 
    public function update(Request $request)
    {
        $calificacion=Calificacion::findOrFail($request->calificacion_id);
        $calificacion->calificacion=$request->calificacion;
        $calificacion->save();
        $persona=$calificacion->persona;
        if($request->ajax()){
            return response()->json(['calificacion'=>"Calificacion Actualizado correctamente"]);
        }else{
            return redirect()->route('personas.show',$persona);
        }
    }
    // %%%%%%%%%%%%%%%%%%%% ESTA FUNCION SE LLAMA DE AJAX Y NO AJAX %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    public function getCalificacion(Request $request)
    {
        $persona_id=$request->persona_id;
        $calificacion=Persona::findOrFail($persona_id)->calificaciones->where('user_id',Auth::user()->id)->first();
        if(is_null($calificacion)){
            return response()->json(['calificado' => 'NO']);
        }else{
            return response()->json(['calificacion' => $calificacion,'calificado'=>"SI"]);
        }
    }
    public function setCalificacion(Request $request)
    {
        $storeupdate=$request->storeupdate; /** esta variabl se usa para saber si se va guardar o actualizar la calificacion*/
        $persona_id=$request->persona_id;
        $calificacion=$request->calificacion;
        $calificacion_id=$request->calificacion_id;
        if($storeupdate=="guardar"){
            $calificacion= new Calificacion();
            $calificacion->calificacion=$request->calificacion;
            $calificacion->persona_id=$request->persona_id;
            $calificacion->user_id=Auth::user()->id;
            $calificacion->save();  
            return response()->json(['mensaje'=>"Se guardo correctamente"]);
        }else{
            $calificacion=Calificacion::findOrFail($calificacion_id);
            $calificacion->calificacion=$request->calificacion;
            $calificacion->save();
            return response()->json(['mensaje'=>"Se actalizó correctamente"]);
        }
    }


}
