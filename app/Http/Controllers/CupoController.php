<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function companieros($grado_id , $anio){
        $data=Estudiante::join("estudiante_grado",'estudiantes.id','estudiante_grado.estudiante_id')
            ->join('inscripciones','inscripciones.estudiante_id','estudiantes.id')
            ->join('personas','personas.id','estudiantes.persona_id')
            ->where('estudiante_grado.grado_id',$grado_id)
            ->where('inscripciones.estado_id',estado('CORRIENDO'))
            ->where('estudiante_grado.anio',$anio)
            ->select('estudiantes.id','inscripciones.id as ins','personas.nombre','personas.apellidop','personas.apellidom','fechaini','fechafin','costo')
            ->get();
        return response()->json($data);
    }
    public function sesiones($inscripcion_id){
        // seria hacer la consulta mostrando los dias que viene, las materias, horarios y mas
        $sesiones=Sesion::join('inscripciones','inscripciones.id','sesions.inscripcione_id')
        ->join('aulas','sesions.aula_id','aulas.id')
        ->join('materias','sesions.materia_id','materias.id')
        ->join('docentes','sesions.docente_id','docentes.id')
        ->join('dias','sesions.dia_id','dias.id')
        ->where('inscripciones.id',$inscripcion_id)
        ->select('dias.dia','materias.materia','docentes.nombrecorto','sesions.horainicio','sesions.horafin','aulas.aula')
        ->get();
        return response()->json($data);
    }
}
