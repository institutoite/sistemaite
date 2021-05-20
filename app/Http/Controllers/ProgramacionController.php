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
    public function generarPrograma($inscripcion_id){
        /** elimina toda la programaciom de esta inscripcion */
        Programacion::where('inscripcion_id','=',$inscripcion_id)->delete();

        $inscripcion=Inscripcione::findOrFail($inscripcion_id);
        $costo_total=$inscripcion->costo;
        $total_horas=$inscripcion->totalhoras;
        $horas_x_clase= $inscripcion->horainicio->floatDiffInHours($inscripcion->horafin);
        $acuenta =$inscripcion->pagos->sum('monto');
        $fecha=$inscripcion->fechaini;
        $cantidad_dias_x_semana = $inscripcion->dias->count();
        $costo_x_clase=($costo_total/$total_horas)*$horas_x_clase;


        $docentes = $inscripcion->docentes;
        $materias = $inscripcion->materias;
        $aulas = $inscripcion->aulas;

       // dd($inscripcion->dias);

        foreach ($inscripcion->dias as $dia) { 
            $vector_dias[] = $dia->dia;
        }
        foreach ($inscripcion->aulas as $aula) {
            $vector_aulas[] = $aula->id;
        }
        foreach ($inscripcion->docentes as $docente) {
            $vector_docente[] = $docente->id;
        }
        foreach ($inscripcion->materias as $materia) {
            $vector_materia[] = $materia->id;
        }

        while ((!in_array($fecha->isoFormat('dddd'), $vector_dias))) {
            $fecha->addDay();
        }
        
        dd($vector_docente);
        while($total_horas>0){ 
            $i=0;
            while(($i < $cantidad_dias_x_semana) && ($total_horas > 0)) {
                $programa = new Programacion();
                if ($acuenta > $costo_x_clase) {
                    $programa->fecha = $fecha;
                    $programa->habilitado=true;
                    $programa->activo=true;
                    $programa->estado='indefinido';
                    $programa->hora_ini=$inscripcion->horainicio;
                    $programa->hora_fin=$inscripcion->horafin;
                    $programa->docente_id=$vector_docente[$i];
                    $programa->materia_id=$vector_materia[$i];
                    $programa->aula_id=$vector_aulas[$i];
                    $programa->inscripcion_id=$inscripcion->id;
                    
                } else {
                    $programa->fecha = $fecha;
                    $programa->habilitado = false;
                    $programa->estado = 'indefinido';
                    $programa->activo = true;
                    $programa->hora_ini = $inscripcion->horainicio;
                    $programa->hora_fin = $inscripcion->horafin;
                    $programa->docente_id = $vector_docente[$i];
                    $programa->materia_id = $vector_materia[$i];
                    $programa->aula_id = $vector_aulas[$i];
                    $programa->inscripcion_id = $inscripcion->id;
                    
                }
                $total_horas = $total_horas - $horas_x_clase;
                $acuenta=$acuenta-$costo_x_clase;
                $programa->save();
                dd($programa);
                $i = $i + 1;
                $fecha->addDay();
                while((!in_array($fecha->isoFormat('dddd'),$vector_dias))){
                    $fecha->addDay();
                }
                
            }
        }
        if($acuenta<$inscripcion->costo){
            return redirect()->route('mostrar.programa', $inscripcion);
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
