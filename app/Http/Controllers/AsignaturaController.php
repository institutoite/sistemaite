<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Http\Requests\AsignaturaGuardarRequest;

class AsignaturaController extends Controller
{
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
        return view('asignatura.show',compact('asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit($asignatura)
    {
        // dd($asignatura);
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
    public function update(Request $request, Asignatura $asignatura)
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