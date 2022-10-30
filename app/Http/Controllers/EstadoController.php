<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoStoreRequest;
use App\Http\Requests\EstadoUpdateRequest;
use Illuminate\Support\Facades\Auth;

class EstadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Estados')->only('index','show');
        $this->middleware('can:Crear Estados')->only('create','store');
        $this->middleware('can:Editar Estados')->only('edit','update');
        $this->middleware('can:Eliminar Estados')->only('destroy');
    }

    public function index()
    {
        return view('estado.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoStoreRequest $request)
    {
        $estadonuevo=new Estado();
        $estadonuevo->estado = $request->estado;
        $estadonuevo->save();
        $estadonuevo->usuarios()->attach(Auth::user()->id);
        return redirect()->route('estado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        $user=$estado->usuarios->first();
        return view('estado.show',compact('estado','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        return view('estado.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoUpdateRequest $request, Estado $estado)
    {
        $estado->estado = $request->estado;
        $estado->save();
        return redirect()->route('estado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        $estado->delete();
        return response()->json(['message' => 'Registro Eliminado']);
    }
}
