<?php

namespace App\Http\Controllers;

use App\Programacion;
use App\Pago;
use App\Inscripcione;


use Illuminate\Http\Request;

class ProgramacionController extends Controller
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
     * @param  \App\Programacion  $programacion
     * @return \Illuminate\Http\Response
     */
    public function show(Programacion $programacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programacion  $programacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Programacion $programacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programacion  $programacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programacion $programacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programacion  $programacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programacion $programacion)
    {
        //
    }
    public function generarPrograma($inscripcion_id ,$pago_id){
        $pago=Pago::findOrFail($pago_id);
        $inscripcion=Inscripcione::findOrFail($pago->pagable_id);
        $costo_total=$inscripcion->costo;
        $total_horas=$inscripcion->totalhoras;
        $horas_x_clase= $inscripcion->horainicio->floatDiffInHours($inscripcion->horafin);
        $acuenta =$pago->monto;
        $fecha=$inscripcion->fechaini;
        $cantidad_dias_x_semana = $inscripcion->dias->count();
        $costo_x_clase=($costo_total/$total_horas)*$horas_x_clase;

        $docentes = $inscripcion->docentes;
        $materias = $inscripcion->materias;
        $aulas = $inscripcion->aulas;

        foreach ($inscripcion->dias as $dia) { 
            $vector_dias[] = $dia->dia;
        }
        foreach ($inscripcion->aulas as $aula) {
            $vector_aulas[] = $aula->aula;
        }
        foreach ($inscripcion->docentes as $docente) {
            $vector_docente[] = $docente->id;
        }
        foreach ($inscripcion->materias as $materia) {
            $vector_docente[] = $materia->id;
        }
        
        //dd($costo_x_clase);
        while($total_horas>0){
            
            $i=0;
            while(($i < $cantidad_dias_x_semana) && ($total_horas > 0)) {
                $programa = new Programacion();
                if ($acuenta > $costo_x_clase) {
                    $programa->fecha = $fecha;
                    $programa->habilitado=true;
                    $programa->activo=true;
                    $programa->estado='no definido';
                    $programa->hora_ini=$inscripcion->horainicio;
                    $programa->hora_fin=$inscripcion->horafin;
                    $programa->docente_id=$docentes[$i]->id;
                    $programa->materia_id=$materias[$i]->id;
                    $programa->aula_id=$aulas[$i]->id;
                    $programa->inscripcion_id=$inscripcion->id;
                } else {
                    $programa->fecha = $fecha;
                    $programa->habilitado = false;
                    $programa->estado = 'no definido';
                    $programa->activo = true;
                    $programa->hora_ini = $inscripcion->horainicio;
                    $programa->hora_fin = $inscripcion->horafin;
                    $programa->docente_id = $docentes[$i]->id;
                    $programa->materia_id = $materias[$i]->id;
                    $programa->aula_id = $aulas[$i]->id;
                    $programa->inscripcion_id = $inscripcion->id;
                    
                }
                $total_horas = $total_horas - $horas_x_clase;
                $acuenta=$acuenta-$costo_x_clase;
                $programa->save();
                $fecha->addDay();
                while((!in_array($fecha->isoFormat('dddd'),$vector_dias))){
                    $fecha->addDay();
                }
                $i=$i+1;
            }
        }
        $programacion=Programacion::join('materias','programacions.materia_id','=','materias.id')
                                ->join('aulas', 'programacions.aula_id', '=', 'aulas.id')
                                ->join('docentes', 'programacions.docente_id', '=', 'docentes.id')
                                ->join('personas', 'personas.id', '=', 'docentes.persona_id')
                                ->select('programacions.fecha','hora_ini','hora_fin','personas.nombre','materias.materia','aulas.aula','programacions.habilitado','programacions.inscripcion_id')
                                ->orderBy('fecha','asc')
                                ->where('inscripcion_id','=',$inscripcion_id)->get();
        if($acuenta<$inscripcion->costo){
            return view('programacion.show', compact('programacion'));
        }else{
            return "Imprimir reporte directamente";
        }
            
    }
    public function mostrarPrograma($inscripcion){
        $programacion = Programacion::join('materias', 'programacions.materia_id', '=', 'materias.id')
        ->join('aulas', 'programacions.aula_id', '=', 'aulas.id')
        ->join('docentes', 'programacions.docente_id', '=', 'docentes.id')
        ->join('personas', 'personas.id', '=', 'docentes.persona_id')
        ->select('programacions.fecha', 'hora_ini', 'hora_fin', 'personas.nombre', 'materias.materia', 'aulas.aula', 'programacions.habilitado', 'programacions.inscripcion_id')
        ->orderBy('fecha', 'asc')
        ->where('inscripcion_id', '=', $inscripcion)->get();
        //$programacion=Programacion::where('inscripcion_id','=',$inscripcion)->get();
        return view('programacion.show', compact('programacion'));
    }
}
