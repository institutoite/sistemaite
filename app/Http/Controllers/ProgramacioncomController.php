<?php

namespace App\Http\Controllers;

use App\Models\Programacioncom;
use App\Models\Matriculacion;
use App\Models\Persona;
use App\Models\Dia;
use App\Models\Sesioncom;
use App\Models\User;
use App\Models\Computacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

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
            
            $respuesta = Sesioncom::where('matriculacion_id', '=', $unaSesioncom->matriculacion_id)->where('id', '>', $unaSesioncom->id)
                        ->orderBy('id', 'asc')->first();
        }
        return $respuesta;
    }

     public function mostrarProgramacom($matriculacion){
        $programacioncom = Programacioncom::join('aulas', 'programacioncoms.aula_id', '=', 'aulas.id')
        ->join('docentes', 'programacioncoms.docente_id', '=', 'docentes.id')
        ->join('personas', 'personas.id', '=', 'docentes.persona_id')
        ->select('programacioncoms.fecha', 'horaini', 'horafin','horas_por_clase', 'personas.nombre', 'aulas.aula', 'programacioncoms.habilitado', 'programacioncoms.matriculacion_id')
        ->orderBy('fecha', 'asc')
        ->where('matriculacion_id', '=', $matriculacion)->get();
        $persona=Persona::findOrFail(Matriculacion::findOrFail($matriculacion)->computacion->persona_id);
        return view('programacioncom.show', compact('programacioncom','matriculacion','persona'));
    }

    public function imprimirProgramacom($matriculacion_id){
        $matriculacion=Matriculacion::findOrFail($matriculacion_id);
        $programacion = Programacioncom::join('aulas', 'programacioncoms.aula_id', '=', 'aulas.id')
            ->join('docentes', 'programacioncoms.docente_id', '=', 'docentes.id')
            ->join('personas', 'personas.id', '=', 'docentes.persona_id')
            ->select('programacioncoms.fecha', 'horaini','programacioncoms.habilitado', 'horafin', 'horas_por_clase', 'personas.nombre', 'aulas.aula', 'programacioncoms.habilitado')
            ->orderBy('fecha', 'asc')
            ->where('matriculacion_id', '=', $matriculacion_id)->get();


        $computacion = Computacion::findOrFail($matriculacion->computacion_id);
        $persona = $computacion->persona;
        //dd($matriculacion);
        $usuario=User::find($matriculacion->userable->user_id);
        $asignatura=$matriculacion->asignatura;
        $carrera=$asignatura->carrera;
        $dompdf = PDF::loadView('programacioncom.reporte', compact('carrera','usuario','programacion','persona','computacion','persona','matriculacion'));
        /**entrae a la persona al cual corresponde esta inscripcion */
        $fecha_actual = Carbon::now();
        $fecha_actual->isoFormat('DD-MM-YYYY-HH:mm:ss');
        $dompdf->setPaper('letter','portrait');
        return $dompdf->download($persona->id . '_' . $fecha_actual . '_' . $persona->nombre . '_' . $persona->apellidop . '.pdf');
    }
    
    public function marcadoNormal($programacioncom_id){
        $programacioncom=Programacioncom::findOrFail($programacioncom_id);
        $matriculacion=Matriculacion::findOrFail($programacioncom->matriculacion);
        $docentes=Docente::join('personas','personas.id','=','docentes.persona_id')
                        ->where('docentes.estado','=','activo')
                        ->select('docentes.id','personas.nombre','personas.apellidop')
                        ->get(); 
        $aulas=Aula::all();
        $hora_inicio=Carbon::now()->isoFormat('HH:mm:ss');
        $hora_fin = Carbon::now()->addHours($programacioncom->horaini->floatDiffInHours($programacioncom->horafin))->isoFormat('HH:mm:ss');
        return view('clase.create',compact('docentes','programacioncom','matriculacion','aulas','hora_inicio','hora_fin'));
    }

        public function programacionescomHoy(Request $request,$matriculacion){
        
        //return response()->json(['cd'=>$matriculacion]);
        $programacion=Programacion::join('docentes','docentes.id','=','programacioncoms.docente_id')
                    ->join('aulas','aulas.id','=','programacioncoms.aula_id')
                    ->where('matriculacion_id',$request->matriculacion_id)
                    ->where('fecha','=', Carbon::now()->isoFormat('Y-M-D'))
                    ->select('programacioncoms.id','fecha','horaini','horafin','programacioncoms.estado','docentes.nombre','aulas.aula');
        return DataTables::of($programacion)
                ->addColumn('btn','programacion.actions')
                ->rawColumns(['btn'])
                ->toJson();
    }
}