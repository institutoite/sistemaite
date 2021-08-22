<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
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
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    public function historia($estudiante_id)
    {
        // $grados=Estudiante::findOrFail($estudiante_id)->grados;
        $grados=Estudiante::join('estudiante_grado','estudiantes.id','=','estudiante_grado.estudiante_id')
                        ->join('grados','grados.id','=','estudiante_grado.grado_id')
                        ->join('colegios','colegios.id','=','estudiante_grado.colegio_id')
                        ->select('estudiantes.id','colegio_id','colegios.nombre','grados.grado','anio')
                        ->orderBy('anio', 'desc')
                        ->get();
        return view('estudiantes.historiaacademica',compact('grados','estudiante_id'));
    }

}
