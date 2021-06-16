<?php

namespace App\Http\Controllers;

use App\Models\Programacion;
use App\Models\Pago;
use App\Models\Docente;
use App\Models\Sesion;
use App\Models\Aula;
use App\Models\Dia;
use App\Models\Inscripcione;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Estudiante;
use App\Models\Feriado;
use App\Models\Materia;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function generarPrograma($inscripcione_id){
        $inscripcion=Inscripcione::findOrFail($inscripcione_id);
        $costo_total=$inscripcion->costo;
        $total_horas=$inscripcion->totalhoras;
        $acuenta =$inscripcion->pagos->sum('monto');

        $fecha=$inscripcion->fechaini;
        foreach ($inscripcion->sesiones as $dia) { 
            $vector_dias[] = Dia::findOrFail($dia->dia_id)->dia;
        }
        while ((!in_array($fecha->isoFormat('dddd'), $vector_dias))) {
            $fecha->addDay();
        }
        
        $sesiones=Sesion::where('inscripcione_id','=',$inscripcione_id)->get();
        while($total_horas>0){
            foreach ($sesiones as $sesion) {
                if ($total_horas > 0) {
                    $programa = new Programacion();
                    $hora_x_sesion= $sesion->horainicio->floatDiffInHours($sesion->horafin);
                    $costo_x_sesion = ($costo_total / $inscripcion->totalhoras) *$hora_x_sesion ;
                    $costo_hora= $costo_total / $total_horas;
                    
                    if($total_horas>$hora_x_sesion){
                        if ($acuenta > $costo_x_sesion) {
                            $this->agregarClase($programa,$fecha,$hora_x_sesion,$total_horas,$sesion,true,$inscripcion);
                        } else {
                            $this->agregarClase($programa, $fecha, $hora_x_sesion,$total_horas, $sesion, false, $inscripcion);
                        }
                    }else{
                        if ($acuenta >= $costo_hora*$total_horas) {
                            $this->agregarClase($programa, $fecha, $hora_x_sesion,$total_horas, $sesion, true, $inscripcion);
                            
                        } else {
                            $this->agregarClase($programa, $fecha, $hora_x_sesion,$total_horas, $sesion, false, $inscripcion);
                        }
                    }
                    $programa->save();
                    $acuenta = $acuenta - $costo_x_sesion;
                    
                    $total_horas = $total_horas - $hora_x_sesion;
                    $siguiente_sesion= $this->siguienteSesion($inscripcion, $sesion);
                    
                    if(($siguiente_sesion->dia_id!=$sesion->dia_id)||($siguiente_sesion->id== Sesion::where('inscripcione_id', $inscripcion->id)->get()->first()->id)){
                        $fecha->addDay();
                        while ((!in_array($fecha->isoFormat('dddd'), $vector_dias))||($this->esFeriado($fecha))) {
                            $fecha->addDay();
                        }
                    }
                }
            }
        }
        
        $inscripcion->fechafin = $programa->fecha;
        if($inscripcion->pagos->sum('monto')<$inscripcion->costo){
            return redirect()->route('mostrar.programa', $inscripcion);
        }else{
            $inscripcion->fecha_proximo_pago=$fecha;
            $inscripcion->save();
            return redirect()->route('imprimir.programa', $inscripcion->id);;
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
    public function siguienteSesion($unaInscripcion,$unaSesion){
        $sesiones_de_esta_inscripcion=Sesion::where('inscripcione_id',$unaInscripcion->id)->get();
        // la sesion actual el es primero consicedarar si tiene una sola sesion
        if($unaSesion->id==$sesiones_de_esta_inscripcion->last()->id){
            //$respuesta = 
            $respuesta= Sesion::where('inscripcione_id', $unaInscripcion->id)->get()->first();
        }else{
            $respuesta = Sesion::where('inscripcione_id', '=', $unaSesion->inscripcione_id)->where('id', '>', $unaSesion->id)
                        ->orderBy('id', 'asc')->first();
        }
        return $respuesta;
    }

 

    public function agregarClase(&$programa, &$fecha, $hora_x_sesion, &$total_horas , &$sesion , $habilitado, &$inscripcion){
        if ($total_horas > $hora_x_sesion) {
            $programa->hora_fin = $sesion->horafin;
            $programa->horas_por_clase = $hora_x_sesion;
        }else{
            $programa->hora_fin = $sesion->horainicio->addMinutes($total_horas * 60);
            $programa->horas_por_clase = $total_horas;
        }
        $programa->fecha = $fecha;
        $programa->habilitado = $habilitado;
        $programa->activo = true;
        $programa->estado = 'indefinido';
        $programa->hora_ini = $sesion->horainicio;
        
        $programa->docente_id = $sesion->docente_id;
        $programa->materia_id = $sesion->materia_id;
        $programa->aula_id = $sesion->aula_id;
        $programa->inscripcione_id = $inscripcion->id;
    }

    public function regenerarPrograma($inscripcione_id,$unaFecha){
        $unaFecha= Carbon::createFromFormat('Y-m-d', $unaFecha);
        $inscripcion= Inscripcione::findOrFail($inscripcione_id);
        
        $horasFaltantes = Programacion::where('inscripcione_id', '=', $inscripcione_id)
                        ->where('fecha', '>=', $unaFecha)->sum('horas_por_clase');
        $total_horas=$horasFaltantes;                
        $horasPasadas = $inscripcion->totalhoras-$horasFaltantes;
        Programacion::where('inscripcione_id', '=', $inscripcione_id) 
            ->where('fecha', '>=', $unaFecha)
            ->delete();
        $costo_hora=$inscripcion->costo/$inscripcion->totalhoras;
        $acuentaTotal = $inscripcion->pagos->sum('monto');
        $costo_horas_pasadas=$horasPasadas*$costo_hora;
        $costo_restante=$acuentaTotal-$costo_horas_pasadas;
        $Acuenta_para_regenerar=$acuentaTotal-$costo_horas_pasadas;
        $fecha = $unaFecha;
        
        foreach ($inscripcion->sesiones as $dia) {
            $vector_dias[] = Dia::findOrFail($dia->dia_id)->dia;
        }

        while ((!in_array($fecha->isoFormat('dddd'), $vector_dias))) {
            $fecha->addDay();
        }
        

        $sesiones = Sesion::where('inscripcione_id', '=', $inscripcione_id)->get();

        //dd($horasFaltantes);
        while ($horasFaltantes > 0) {
            foreach ($sesiones as $sesion) {
                if ($horasFaltantes > 0) {

                    $programa = new Programacion();
                    $hora_x_sesion = $sesion->horainicio->floatDiffInHours($sesion->horafin);
                    $costo_x_sesion = ($costo_restante / $total_horas) * $hora_x_sesion;
                    /** aqui buscar el primer dia que consinda con las sesiones */

                    //dd($hora_x_sesion);
                    if ($horasFaltantes > $hora_x_sesion) {
                        if ($Acuenta_para_regenerar > $costo_x_sesion) {
                            $this->agregarClase($programa, $fecha, $hora_x_sesion, $horasFaltantes, $sesion, true, $inscripcion);
                        } else {
                            $this->agregarClase($programa, $fecha, $hora_x_sesion, $horasFaltantes, $sesion, false, $inscripcion);
                        }
                    } else {
                        if ($Acuenta_para_regenerar >= $costo_hora * $horasFaltantes) {
                            $this->agregarClase($programa, $fecha, $hora_x_sesion, $horasFaltantes, $sesion, true, $inscripcion);
                        } else {
                            $this->agregarClase($programa, $fecha, $hora_x_sesion, $horasFaltantes, $sesion, false, $inscripcion);
                        }
                    }
                    $programa->save();

                    $Acuenta_para_regenerar = $Acuenta_para_regenerar - $costo_x_sesion;
                    $horasFaltantes = $horasFaltantes - $hora_x_sesion;
                    $siguiente_sesion = $this->siguienteSesion($inscripcion, $sesion);

                    if (($siguiente_sesion->dia_id != $sesion->dia_id) || ($siguiente_sesion->id == Sesion::where('inscripcione_id', $inscripcion->id)->get()->first()->id)) {
                        $fecha->addDay();
                        while ((!in_array($fecha->isoFormat('dddd'), $vector_dias))) {
                            $fecha->addDay();
                        }
                    }


                    
                    
                    
                } 
                //$Acuenta_para_regenerar = $Acuenta_para_regenerar - $costo_x_sesion;
            }
        }
        $inscripcion->fechafin = $programa->fecha;
        if ($Acuenta_para_regenerar < $inscripcion->costo) {
            return redirect()->route('mostrar.programa', $inscripcion);
        } else {
            $inscripcion->fecha_proximo_pago = $fecha;
            $inscripcion->save();
            return redirect()->route('imprimir.programa', $inscripcion->id);/** llamar al metodo que muestra pdf*/
        }    
    }
    public function actualizarProgramaSegunPago($inscripcione_id,$pago_id){
        $inscripcion = Inscripcione::findOrFail($inscripcione_id);
        $total_costo=$inscripcion->costo;
        $total_horas=$inscripcion->totalhoras;
        $costo_por_hora=$total_costo/$total_horas;
        $ProgramasNoPagadas = Programacion::where('inscripcione_id', '=', $inscripcione_id)
                                        ->where('habilitado', '=', 0)
                                        ->get();
        $CuantoPago=Pago::findOrFail($pago_id)->monto;
        //dd($ProgramasNoPagadas);
        foreach ($ProgramasNoPagadas as $programa) {
            
            $costo_programa = $programa->hora_ini->floatDiffInHours($programa->hora_fin)*($costo_por_hora);
            
            if($CuantoPago>$costo_programa){
                $programa->habilitado=1;
                $programa->save();
                $CuantoPago=$CuantoPago-$costo_programa;
            }
        }
        //* seria recomendable que mostremos directo imprimir*//
        return redirect()->route('mostrar.programa', $inscripcion);
    }



    public function mostrarPrograma($inscripcion){
        $programacion = Programacion::join('materias', 'programacions.materia_id', '=', 'materias.id')
        ->join('aulas', 'programacions.aula_id', '=', 'aulas.id')
        ->join('docentes', 'programacions.docente_id', '=', 'docentes.id')
        ->join('personas', 'personas.id', '=', 'docentes.persona_id')
        ->select('programacions.fecha', 'hora_ini', 'hora_fin','horas_por_clase', 'personas.nombre', 'materias.materia', 'aulas.aula', 'programacions.habilitado', 'programacions.inscripcione_id')
        ->orderBy('fecha', 'asc')
        ->where('inscripcione_id', '=', $inscripcion)->get();
        $persona=Persona::findOrFail(Inscripcione::findOrFail($inscripcion)->estudiante->persona_id);
        return view('programacion.show', compact('programacion','inscripcion','persona'));
    }

    public function imprimirPrograma($inscripcione_id){

        $inscripcion=Inscripcione::findOrFail($inscripcione_id);
        $programacion = Programacion::join('materias', 'programacions.materia_id', '=', 'materias.id')
            ->join('aulas', 'programacions.aula_id', '=', 'aulas.id')
            ->join('docentes', 'programacions.docente_id', '=', 'docentes.id')
            ->join('personas', 'personas.id', '=', 'docentes.persona_id')
            ->select('programacions.fecha', 'hora_ini','programacions.habilitado', 'hora_fin', 'horas_por_clase', 'personas.nombre', 'materias.materia', 'aulas.aula', 'programacions.habilitado')
            ->orderBy('fecha', 'asc')
            ->where('inscripcione_id', '=', $inscripcione_id)->get();

        $pdf = PDF::loadView('programacion.reporte', compact('programacion'));

        /**entrae a la persona al cual corresponde esta inscripcion */
        $estudiante = Estudiante::findOrFail($inscripcion->estudiante_id);
        $persona = $estudiante->persona;
        $fecha_actual = Carbon::now();
        $fecha_actual->isoFormat('DD-MM-YYYY-HH:mm:ss');
        return $pdf->download($persona->id . '_' . $fecha_actual . '_' . $persona->nombre . '_' . $persona->apellidop . '.pdf');
    }

    public function marcadoNormal($programacion_id){
        $programa=Programacion::findOrFail($programacion_id);
        $inscripcion=Inscripcione::findOrFail($programa->inscripcione_id);
        $docentes=Docente::join('personas','personas.id','=','docentes.persona_id')
                        ->where('docentes.estado','=','activo')
                        ->select('docentes.id','personas.nombre','personas.apellidop')
                        ->get(); 
        $materias=Materia::all();
        $aulas=Aula::all();
        
        $hora_inicio=Carbon::now()->isoFormat('HH:mm:ss');
        $hora_fin = Carbon::now()->addHours($programa->hora_ini->floatDiffInHours($programa->hora_fin))->isoFormat('HH:mm:ss');

        

        return view('clase.create',compact('docentes','programa','inscripcion','materias','aulas','hora_inicio','hora_fin'));
    }
    // public function programasPresentes($inscripcion_id)
    // {
    //     $programas=Programacion::joint('inscripciones','programacions.inscripcione_id','=','inscripciones.id')
    //                             ->join('estudiantes', 'inscripciones.estudiante_id', '=', 'estudiantes.id')
    //                             ->join('personas', 'estudiantes.persona_id', '=', 'personas.id')
    //                             ->join('clases', 'clases.programacion_id', '=', 'clases.id')
    //                             //->join('docentes','docentes.id','=','clases.docente_id')
    //                             ->where('programacions.fecha','clases.fecha')//que sea la clase de hoy la que se marco ahora por que puede tener muchas clases una inscripcion
    //                             //-> y que este presente
    //                             //en la vista podemos calcular cuanto tiempo ya va pasando 
    //                             ->select('personas.nombre','personas.apellidop','personas.apellidom','clases.horainicio','clases.horafin',,)
    //                             ->get();
    // }
}
