<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Http\Requests\StoreMensajeRequest;
use App\Http\Requests\UpdateMensajeRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;


class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('whatsapp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('whatsapp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMensajeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMensajeRequest $request)
    {
        $mensaje=new Mensaje();
        $mensaje->nombre = $request->nombre;
        $mensaje->mensaje= $request->mensaje;
        $mensaje->vigente=1;
        $mensaje->save();
        $mensaje->usuarios()->attach(Auth::user()->id);
        return redirect()->route('mensaje.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje $mensaje)
    {
        //dd($mensaje);
        $user=$mensaje->usuarios->first();
        
        return view('whatsapp.show',compact('mensaje','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensaje $mensaje)
    {
        return view("whatsapp.edit",compact('mensaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMensajeRequest  $request
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMensajeRequest $request, Mensaje $mensaje)
    {
        $mensaje->nombre=$request->nombre;
        $mensaje->mensaje=$request->mensaje;
        $mensaje->save();
        
        //dd($mensaje);
        return redirect()->route("mensaje.show",$mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();
        return response()->json(['mensaje'=>"Se eliminó correctamente"]);
    }

    
    public function listar(){
        $mensajes=Mensaje::all();
        return datatables()->of($mensajes)
        ->addColumn('btn', 'whatsapp.action')
        ->rawColumns(['btn','mensaje'])
        ->toJson();
    }
    public function listarMensajes(Request $request){
        //return response()->json($request->all());
        $mensajes=Mensaje::all();
        return datatables()->of($mensajes)
        ->addColumn('telefono',$request->telefono)
        ->addColumn('btn', 'whatsapp.actionenvio')
        ->rawColumns(['btn','telefono'])
        ->toJson();
    }

    public function darbaja(Request $request)
    {
       // return response()->json(['id'=>$request->all()]);
        $mensaje=Mensaje::findOrFail($request->mensaje_id);
        $mensaje->vigente=0;
        $mensaje->save();
        return response()->json(['mensaje'=>"Se dió de BAJA el registro correctamente"]);
    }
   
    public function daralta(Request $request)
    {
        $mensaje=Mensaje::findOrFail($request->mensaje_id);
        $mensaje->vigente=1;
        $mensaje->save();
        return response()->json(['mensaje'=>"Se dió de ALTA el registro correctamente"]);
    }
    public function getMensajeGenerico(Request $request)
    // public function getMensajeGenerico()
    {
        $mensaje=Mensaje::findOrFail($request->mensaje_id);
        return response()->json($mensaje);
    }
}
