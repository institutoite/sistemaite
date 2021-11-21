<?php

namespace App\Http\Controllers;

use App\Models\Programacioncom;
use App\Models\Matriculacion;
use App\Models\Dia;
use App\Models\Sesioncom;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ProgramacioncomController extends Controller
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
     * @param  \App\Models\Programacioncom  $programacioncom
     * @return \Illuminate\Http\Response
     */
    public function show(Programacioncom $programacioncom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programacioncom  $programacioncom
     * @return \Illuminate\Http\Response
     */
    public function edit(Programacioncom $programacioncom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programacioncom  $programacioncom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programacioncom $programacioncom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programacioncom  $programacioncom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programacioncom $programacioncom)
    {
        //
    }

     public function generarPrograma($matriculacion_id){
        $matriculacion=Matriculacion::findOrFail($matriculacion_id);
        
        $costo_total=$matriculacion->costo;
        $total_horas=$matriculacion->totalhoras;
        $acuenta =$matriculacion->pagos->sum('monto');
        $fecha=$matriculacion->fechaini;
        foreach ($matriculacion->sesionescoms as $dia) { 
            $vector_dias[] = Dia::findOrFail($dia->dia_id)->dia;
        }
        
        while ((!in_array($fecha->isoFormat('dddd'), $vector_dias))) {
            $fecha->addDay();
        }
        $sesiones=Sesioncom::where('matriculacion_id','=',$matriculacion_id)->get();
        

            while($total_horas>0){
                foreach ($sesiones as $sesion) {
                    if ($total_horas > 0) {
                        $programa = new Programacioncom();
                        $hora_x_sesion= $sesion->horainicio->floatDiffInHours($sesion->horafin);
                        $costo_x_sesion = ($costo_total / $matriculacion->totalhoras) *$hora_x_sesion ;
                        $costo_hora= $costo_total / $total_horas;
                        
                        if($total_horas>$hora_x_sesion){
                            if ($acuenta > $costo_x_sesion) {
                                $this->agregarClase($programa,$fecha,$hora_x_sesion,$total_horas,$sesion,true,$matriculacion);
                            } else {
                                $this->agregarClase($programa, $fecha, $hora_x_sesion,$total_horas, $sesion, false, $matriculacion);
                            }
                        }else{
                            if ($acuenta >= $costo_hora*$total_horas) {
                                $this->agregarClase($programa, $fecha, $hora_x_sesion,$total_horas, $sesion, true, $matriculacion);
                                
                            } else {
                                $this->agregarClase($programa, $fecha, $hora_x_sesion,$total_horas, $sesion, false, $matriculacion);
                            }
                        }
                        $programa->save();
                        $acuenta = $acuenta - $costo_x_sesion;
                        
                        $total_horas = $total_horas - $hora_x_sesion;
                        $siguiente_sesion= $this->siguienteSesion($matriculacion, $sesion);
                        
                        if(($siguiente_sesion->dia_id!=$sesion->dia_id)||($siguiente_sesion->id== Sesion::where('matriculacion_id', $matriculacion->id)->get()->first()->id)){
                            $fecha->addDay();
                            while ((!in_array($fecha->isoFormat('dddd'), $vector_dias))||($this->esFeriado($fecha))) {
                                $fecha->addDay();
                            }
                        }
                    }
                }
            }
            $matriculacion->fechafin = $programa->fecha;
            if ($matriculacion->pagos->sum('monto') < $matriculacion->costo) {
                return redirect()->route('mostrar.programacioncom', $matriculacion);
            } else {
                $matriculacion->fecha_proximo_pago = $fecha;
                $matriculacion->save();
                return redirect()->route('imprimir.programacioncom', $matriculacion->id);;
            }   
        
    }
    /**
 * Funciones de apoyo para generar clases
 */
    public function esFeriado($unaFecha){
        //$frecuencia=count(Feriado::where('fecha','=',$unaFecha)->get());
        $cantidad = count(DB::table('feriados')->whereIn('fecha', [$unaFecha])->get());
        return $cantidad>0;
    }


    /**
     * esta funcion hace rotar el turno de las sesiones tipo ronda 
     */
    public function siguienteSesion($unaMatriculacion,$unaSesioncom){
        $sesiones_de_esta_matriculacion=Sesioncom::where('matriculacion_id',$unaMatriculacion->id)->get();
        // la sesion actual el es primero consicedarar si tiene una sola sesion
        
        if($unaSesioncom->id==$sesiones_de_esta_matriculacion->last()->id){
            //$respuesta = 
            $respuesta= Sesioncom::where('matriculacion_id', $unaMatriculacion->id)->get()->first();
        }else{
            
            $respuesta = Sesioncom::where('matriculacion_id', '=', $unaSesioncom->matriculacion_id)->where('id', '>', $unaSesion->id)
                        ->orderBy('id', 'asc')->first();
        }
        return $respuesta;
    }


    public function agregarClase(&$programacom, &$fecha, $hora_x_sesion, &$total_horas , &$sesioncom , $habilitado, &$matriculacion){
        if ($total_horas > $hora_x_sesion) {
            $programacom->horafin = $sesioncom->horafin;
            $programacom->horas_por_clase = $hora_x_sesion;
        }else{
            $programacom->horafin = $sesioncom->horainicio->addMinutes($total_horas * 60);
            $programacom->horas_por_clase = $total_horas;
        }
        $programacom->fecha = $fecha;
        $programacom->habilitado = $habilitado;
        $programacom->activo = true;
        $programacom->estado = 'INDEFINIDO';
        $programacom->horaini = $sesioncom->horainicio;
        
        $programacom->docente_id = $sesioncom->docente_id;
        $programacom->aula_id = $sesioncom->aula_id;
        $programacom->matriculacion_id = $matriculacion->id;
    }

}
