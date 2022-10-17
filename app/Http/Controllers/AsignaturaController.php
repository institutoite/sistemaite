<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\User;
use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Http\Requests\AsignaturaGuardarRequest;
use App\Http\Requests\AsignaturaUpdateRequest;
use Illuminate\Support\Facades\Auth;

class AsignaturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Asignaturas')->only('index','show');
        $this->middleware('can:Crear Asignaturas')->only('create','store');
        $this->middleware('can:Editar Asignaturas')->only('edit','update');
        $this->middleware('can:Eliminar Asignaturas')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asignatura.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras=Carrera::all();
        return view('asignatura.create',compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignaturaGuardarRequest $request)
    {
        $asignatura= new Asignatura();
        $asignatura->asignatura= $request->asignatura;
        $asignatura->carrera_id= $request->carrera_id;
        $asignatura->save();
        $asignatura->usuarios()->attach(Auth::user()->id);
        return redirect()->route('asignatura.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show($asignatura_id)
    {
        $asignatura=Asignatura::findOrFail($asignatura_id);
        $user=$asignatura->usuarios->first();
        return view('asignatura.show',compact('asignatura','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit($asignatura)
    {
        
        $carreras=Carrera::all();
        $asignatura= Asignatura::findOrFail($asignatura);
        return view('asignatura.edit', compact('asignatura','carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(AsignaturaUpdateRequest $request, Asignatura $asignatura)
    {
        $asignatura->asignatura=$request->asignatura;
        $asignatura->carrera_id=$request->carrera_id;
        $asignatura->save();
        return redirect()->route('asignatura.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
}
