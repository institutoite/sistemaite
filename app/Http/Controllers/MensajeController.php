<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Http\Requests\StoreMensajeRequest;
use App\Http\Requests\UpdateMensajeRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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
        $mensaje->userable()->create(['user_id'=>Auth::user()->id]);
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
        $user=User::findOrFail($mensaje->userable->user_id);
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
        //
    }

    
    public function listar(){
        $mensajes=Mensaje::all();
        return datatables()->of($mensajes)
        ->addColumn('btn', 'whatsapp.action')
        ->rawColumns(['btn'])
        ->toJson();
    }

}
