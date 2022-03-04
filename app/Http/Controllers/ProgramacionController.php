<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

use App\Models\Programacion;
use App\Models\Pago;

use App\Models\Docente;
use App\Models\Sesion;
use App\Models\Aula;
use App\Models\Dia;
use App\Models\Inscripcione;
use Carbon\Carbon;
// use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Estudiante;
use App\Models\Feriado;
use App\Models\Materia;
use App\Models\Modalidad;
use App\Models\Licencia;
use App\Models\Nivel;
use App\Models\Tema;
use App\Models\Observacion;
use App\Models\Estado;
use App\Models\Persona;
use App\Models\Colegio;
use App\Models\User;
use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use App\Http\Controllers\PDFController;
use PDF;

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
    public function mostrar(Request $request)
    {       
        $programacion=Programacion::findOrFail($request->id);
        $observaciones=$programacion->observaciones;
        $docente=$programacion->docente;
        $materia=$programacion->materia;
        $aula=$programacion->aula;
        $clases=$programacion->clases;
        $licencias=Licencia::join('motivos','motivos.id','=','licencias.motivo_id')
            ->join('programacions','programacions.id','=','licencias.licenciable_id')
            ->where('programacions.id','=',$request->id)
            ->select('motivos.motivo','solicitante','parentesco','licencias.created_at','licencias.updated_at')
            ->get();
        $estado=Estado::findOrFail($programacion->estado_id);
        //return response()->json($programacion);    
        $data=['programacion'=>$programacion,'estado'=>$estado , 'observaciones'=>$observaciones,'docente'=>$docente, 'materia' => $materia, 'aula' => $aula,'clases'=>$clases,'licencias'=>$licencias];
        return response()->json($data);
    }
    public function mostrarClases(Request $request)
    {
        $programacion = Programacion::findOrFail($request->id);
        $observaciones = $programacion->observaciones;
        $docente = $programacion->docente;
        $materia = $programacion->materia;
        $aula = $programacion->aula;
        $estado=$programacion->estado;

        $licencias=Licencia::join('motivos','motivos.id','=','licencias.motivo_id')
            ->join('programacions','programacions.id','=','licencias.licenciable_id')
            ->where('programacions.id','=',$request->id)
            ->select('motivos.motivo','solicitante','parentesco','licencias.created_at','licencias.updated_at')
            ->get();

        $clases=Programacion::join('clases','programacions.id','clases.programacion_id')
                    ->join('docentes','docentes.id','programacions.docente_id')
                    ->join('materias','materias.id','programacions.materia_id')
                    ->join('aulas','aulas.id','programacions.aula_id')
                    ->join('temas','temas.id','clases.tema_id')
                    ->join('estados','estados.id','clases.estado_id')
                    ->where('programacions.id',$request->id)
                    ->select('clases.id','clases.fecha','clases.horainicio','estados.estado','clases.horafin','docentes.nombre','materias.materia', 'aulas.aula','temas.tema')
                    ->get();
        $data = ['programacion' => $programacion, 'estado'=>$estado,'observaciones' => $observaciones, 'docente' => $docente, 'materia' => $materia, 'aula' => $aula, 'clases' => $clases,'licencias'=>$licencias];
        return response()->json($data);
    }

    public function programacionesHoy(Request $request){
        $programacion=Programacion::join('docentes','docentes.id','=','programacions.docente_id')
                    ->join('materias','materias.id','=','programacions.materia_id')
                    ->join('aulas','aulas.id','=','programacions.aula_id')
                    ->join('estados','estados.id','=','programacions.estado_id')
                    ->where('inscripcione_id',$request->inscripcion)
                    ->where('fecha','=', Carbon::now()->isoFormat('Y-M-D'))
                    ->select('programacions.id','fecha','hora_ini','hora_fin','estados.estado','docentes.nombre','materias.materia','aulas.aula');
        return DataTables::of($programacion)
                ->addColumn('btn','programacion.actions')
                ->rawColumns(['btn'])
                ->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programacion  $programacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Programacion $programacion)
    {
        $docentes=Docente::all();
        $materias=Materia::all();
        $aulas=Aula::all();
        return view('programacion.edit',compact('programacion','docentes','materias','aulas'));
    }

     public function editar(Request $request)
    {
        $programacion=Programacion::findOrFail($request->id);
        $docentes=Docente::all();
        $materias=Materia::all();
        $aulas=Aula::all();
        $estados=Estado::all();
        //return view('programacion.edit',compact('programacion','docentes','materias','aulas'));
        $data=['programacion'=>$programacion,'docentes'=>$docentes,'materias'=>$materias,'aulas'=>$aulas,'estados'=>$estados];
        return response()->json($data);

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
        //dd($request->activo);
        $arrayObservable= [
            'observacion' => 'Se editó los valores anteriores son' .
                'Hora Inicio= ' . $programacion->hora_ini . ' ' .
                'Hora Fin= ' . $programacion->hora_fin . ' ' .
                'Fecha = ' . $programacion->fecha . ' ' .
                'Estado = ' . $programacion->estado_id . ' ' .
                'activo = ' . $programacion->activo . ' ' .
                'horas por clase= ' . $programacion->horas_por_clase . ' ' .
                'Docente id=' . $programacion->docente_id . ' ' .
                'Materia id=' . $programacion->materia_id . ' ' .
                'Aula id=' . $programacion->aula_id . ' ',
            'activo' => 1,
            'observable_id' => $programacion->id,
            'observable_tipe' => Programacion::class,
        ];
        
        $programacion->observaciones()->create($arrayObservable);
        $hora_inicio=Carbon::create($request->hora_ini);
        $hora_fin=Carbon::create($request->hora_fin);
        $programacion->fecha            =$request->fecha;
        $programacion->activo           =$request->activo;
        $programacion->estado_id           =$request->estado_id;
        $programacion->hora_fin         =$request->hora_fin;
        $programacion->hora_ini         =$request->hora_ini;
        $programacion->horas_por_clase  = $hora_inicio->floatDiffInHours($hora_fin);
        $programacion->docente_id       =$request->docente_id;
        $programacion->materia_id       =$request->materia_id;
        $programacion->aula_id          =$request->aula_id;
        $programacion->inscripcione_id  =$request->inscripcione_id;
        $programacion->save();

        return redirect()->route('clases.marcado.general', $programacion->inscripcione_id);

    }
    public function actualizar(Request $request)
    {
        //return response()->json($request->all());
        $programacion=Programacion::findOrFail($request->programacion_id);
        $arrayObservable= [
            'observacion' => 'Se editó los valores anteriores son' .
                'Hora Inicio: ' . $programacion->hora_ini . ' ' .
                'Hora Fin: ' . $programacion->hora_fin . ' ' .
                'Fecha : ' . $programacion->fecha . ' ' .
                'Estado : ' . $programacion->estado->estado . ' ' .
                'activo : ' . $programacion->activo . ' ' .
                'horas por clase: ' . $programacion->horas_por_clase . ' ' .
                'Docente: ' . $programacion->docente->nombre . ' ' .
                'Materia: ' . $programacion->materia->materia . ' ' .
                'Aula: ' . $programacion->aula->aula,
                'activo'=> 1,
                'observable_id'=> $programacion->id,
                'observable_tipe'=> Programacion::class,
        ];
        $programacion->observaciones()->create($arrayObservable);

        $hora_inicio=Carbon::create($request->hora_ini);
        $hora_fin=Carbon::create($request->hora_fin);
        $programacion->fecha            =$request->fecha;
        $programacion->activo           =$request->activo;
        $programacion->estado_id           =$request->estado_id;
        $programacion->hora_fin         =$request->hora_fin;
        $programacion->hora_ini         =$request->hora_ini;
        $programacion->horas_por_clase  = $hora_inicio->floatDiffInHours($hora_fin);
        $programacion->docente_id       =$request->docente_id;
        $programacion->materia_id       =$request->materia_id;
        $programacion->aula_id          =$request->aula_id;
        $programacion->inscripcione_id  =$request->inscripcione_id;
        $programacion->save();

        $docente=$programacion->docente;
        $materia=$programacion->materia;
        $aula=$programacion->aula;

        $data=["programacion"=>$programacion,"docente"=>$docente,"materia"=>$materia,"aula"=>$aula];
        
        return response()->json($data);

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

    /***********************************************************************************************
     * 
     *           G E N E R A R  P R O G R A M A  
     * 
     ***********************************************************************************************/
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
                            if ($acuenta >= $costo_x_sesion) {
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
            if ($inscripcion->pagos->sum('monto') < $inscripcion->costo) {
                return redirect()->route('mostrar.programa', $inscripcion);
            } else {
                $inscripcion->fecha_proximo_pago = $fecha;
                $inscripcion->save();
                return redirect()->route('mostrar.programa', $inscripcion);
                //return redirect()->route('imprimir.programa', $inscripcion->id);;
            }   
        
    }

/***********************************************************************************************
 * 
 *                                      G E N E R A R  P R O G R A M A  D E G  U A R D  E R I A
 * 
 ***********************************************************************************************/

    public function generarProgramaGuarderia($inscripcione_id)
    {
        $inscripcion = Inscripcione::findOrFail($inscripcione_id);
        //dd($inscripcion);

        $costo_total = $inscripcion->costo;
        $total_horas = $inscripcion->totalhoras;
        $acuenta = $inscripcion->pagos->sum('monto');
        $fecha = $inscripcion->fechaini;
        foreach ($inscripcion->sesiones as $dia) {
            $vector_dias[] = Dia::findOrFail($dia->dia_id)->dia;
        }
        while ((!in_array($fecha->isoFormat('dddd'), $vector_dias))) {
            $fecha->addDay();
        }

        $sesiones = Sesion::where('inscripcione_id', '=', $inscripcione_id)->get();
        $inscripcion = Inscripcione::findOrFail($inscripcione_id);
        $sesiones = Sesion::where('inscripcione_id', '=', $inscripcione_id)->get();
        while ($fecha < $inscripcion->fechaini->addMonth()->subDay()) {
            foreach ($sesiones as $sesion) {
                $programa = new Programacion();
                $hora_x_sesion = $sesion->horainicio->floatDiffInHours($sesion->horafin);
                $costo_x_sesion = ($costo_total / $inscripcion->totalhoras) * $hora_x_sesion;

                $costo_hora = $costo_total / $total_horas;
                //dd($costo_hora);
                if ($total_horas > $hora_x_sesion) {
                    if ($acuenta >= $costo_x_sesion) {
                        $this->agregarClase($programa, $fecha, $hora_x_sesion, $total_horas, $sesion, true, $inscripcion);
                    } else {
                        $this->agregarClase($programa, $fecha, $hora_x_sesion, $total_horas, $sesion, false, $inscripcion);
                    }
                } else {
                    if ($acuenta >= $costo_hora * $total_horas) {
                        $this->agregarClase($programa, $fecha, $hora_x_sesion, $total_horas, $sesion, true, $inscripcion);
                    } else {
                        $this->agregarClase($programa, $fecha, $hora_x_sesion, $total_horas, $sesion, false, $inscripcion);
                    }
                }
                $programa->save();
                $acuenta = $acuenta - $costo_x_sesion;
                $siguiente_sesion = $this->siguienteSesion($inscripcion, $sesion);

                if (($siguiente_sesion->dia_id != $sesion->dia_id) || ($siguiente_sesion->id == Sesion::where('inscripcione_id', $inscripcion->id)->get()->first()->id)) {
                    $fecha->addDay();
                    while ((!in_array($fecha->isoFormat('dddd'), $vector_dias)) || ($this->esFeriado($fecha))) {
                        $fecha->addDay();
                    }
                }
                if ($fecha >= $inscripcion->fechaini->addMonth()) {
                    break;
                }
            }
        }
        $inscripcion->fechafin = $programa->fecha;
        if ($inscripcion->pagos->sum('monto') < $inscripcion->costo) {
            return redirect()->route('mostrar.programa', $inscripcion);
        } else {
            $inscripcion->fecha_proximo_pago = $fecha;
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
        $programa->estado_id = Config::get('constantes.ESTADO_INDEFINIDO');
        $programa->hora_ini = $sesion->horainicio;
        
        $programa->docente_id = $sesion->docente_id;
        $programa->materia_id = $sesion->materia_id;
        $programa->aula_id = $sesion->aula_id;
        $programa->inscripcione_id = $inscripcion->id;
    }

    public function EliminarTodosLosProgramas($inscripcione_id){
        Programacion::where('inscripcione_id', '=', $inscripcione_id)->delete();
    }

    public function regenerarPrograma($inscripcione_id,$unaFecha,$unModo = 'desde'){
        if($unModo=='todo'){
            $this->EliminarTodosLosProgramas($inscripcione_id);
            $this->generarPrograma($inscripcione_id);
        }
        $unaFecha= Carbon::createFromFormat('Y-m-d', $unaFecha);
        $inscripcion= Inscripcione::findOrFail($inscripcione_id);
        $FechaDesde=$unaFecha->format('Y-m-d');
        $horasFaltantes = Programacion::where('inscripcione_id', '=', $inscripcione_id)->where('fecha', '>=', $FechaDesde)->sum('horas_por_clase');
        $total_horas=$horasFaltantes;                
        $horasPasadas = $inscripcion->totalhoras-$horasFaltantes;
        Programacion::where('inscripcione_id', '=', $inscripcione_id)->where('fecha', '>=', $FechaDesde)->delete();
        $costo_hora=$inscripcion->costo/$inscripcion->totalhoras;
        $acuentaTotal = $inscripcion->pagos->sum('monto');
        $CostoTotal = $inscripcion->costo;
        $costo_horas_pasadas=$horasPasadas*$costo_hora;
        $costo_restante=$CostoTotal-$costo_horas_pasadas;
        $Acuenta_para_regenerar=$acuentaTotal-$costo_horas_pasadas;
        $fecha = $unaFecha;
        foreach ($inscripcion->sesiones as $dia)
            $vector_dias[] = Dia::findOrFail($dia->dia_id)->dia;
        while ((!in_array($fecha->isoFormat('dddd'), $vector_dias)))
            $fecha->addDay();
        $sesiones = Sesion::where('inscripcione_id', '=', $inscripcione_id)->get();
        while ($horasFaltantes > 0) {
            foreach ($sesiones as $sesion) {
                if ($horasFaltantes > 0) {
                    $programa = new Programacion();
                    $hora_x_sesion = $sesion->horainicio->floatDiffInHours($sesion->horafin);
                    $costo_x_sesion = ($costo_restante / $total_horas) * $hora_x_sesion;
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
                        //while ((!in_array($fecha->isoFormat('dddd'), $vector_dias))) {
                        while ((!in_array($fecha->isoFormat('dddd'), $vector_dias))||($this->esFeriado($fecha))) {
                            $fecha->addDay();
                        }
                    }
                } 
            }
        }
        $inscripcion->fechafin = $programa->fecha;
        if ($Acuenta_para_regenerar < $inscripcion->costo) {
            return redirect()->route('mostrar.programa', $inscripcion);
        } else {
            $inscripcion->fecha_proximo_pago = $fecha;
            $inscripcion->save();
            return redirect()->route('mostrar.programa', $inscripcion);
            //return redirect()->route('imprimir.programa', $inscripcion->id);/** llamar al metodo que muestra pdf*/
        }    
    }


    public function deshabilitarTodoProgramas($inscripcione_id){
        $programas=Programacion::where('inscripcione_id', $inscripcione_id)->get();
        foreach ($programas as $programa) {
            $programa->habilitado=0;
            $programa->save();
        }
    }
    public function actualizarProgramaSegunPago($inscripcione_id){
        
        $inscripcion = Inscripcione::findOrFail($inscripcione_id);
        $total_costo=$inscripcion->costo;
        $total_horas=$inscripcion->totalhoras;
        $costo_por_hora=$total_costo/$total_horas;
        
        $programas = Programacion::where('inscripcione_id', '=', $inscripcione_id)
        ->get();
        
        $acuentaTotal=$inscripcion->pagos->sum->monto;
        $TotalPagado=$acuentaTotal;
        $this->deshabilitarTodoProgramas($inscripcione_id);
        
        foreach ($programas as $programa) {
            $costo_programa = $programa->hora_ini->floatDiffInHours($programa->hora_fin)*($costo_por_hora);
            $P=Programacion::findOrFail($programa->id);
            if($acuentaTotal>=$costo_programa){
                $P->habilitado=1;
                $P->save();
                $acuentaTotal=$acuentaTotal-$costo_programa;
            }
        }

        if ($TotalPagado < $inscripcion->costo) {
            return redirect()->route('mostrar.programa', $inscripcion);
        } else {
            $inscripcion->fecha_proximo_pago = $inscripcion->programaciones->last()->fecha->isoFormat('Y-M-D');
            $inscripcion->save();
            return redirect()->route('imprimir.programa', $inscripcion->id);
            
        }    
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


        $estudiante = Estudiante::findOrFail($inscripcion->estudiante_id);
        $persona = $estudiante->persona;
        $colegio=Colegio::find($estudiante->grados->last()->pivot->colegio_id);
        $usuario=User::find($inscripcion->userable->user_id);
        $modalidad=$inscripcion->modalidad;
        $nivel=Nivel::findOrFail($estudiante->grados->last()->nivel_id);
        $grado=Grado::findOrFail($estudiante->grados->last()->pivot->grado_id);
        $dompdf = PDF::loadView('programacion.reporte', compact('grado','nivel','modalidad','usuario','programacion','persona','estudiante','persona','colegio','inscripcion'));
        /**entrae a la persona al cual corresponde esta inscripcion */
        $fecha_actual = Carbon::now();
        $fecha_actual->isoFormat('DD-MM-YYYY-HH:mm:ss');
        $dompdf->setPaper('letter','portrait');
        return $dompdf->download($persona->id . '_' . $fecha_actual . '_' . $persona->nombre . '_' . $persona->apellidop . '.pdf');
    }

    public function marcadoNormal($programacion_id){ //*
        $programa=Programacion::findOrFail($programacion_id);
        $inscripcion=Inscripcione::findOrFail($programa->inscripcione_id);
        $docentes=Docente::join('personas','personas.id','=','docentes.persona_id')
                        ->where('docentes.estado','=','activo')
                        ->select('docentes.id','personas.nombre','personas.apellidop')
                        ->get(); 
        $nivel=Nivel::findOrFail(Modalidad::findOrFail($inscripcion->modalidad_id)->nivel_id);
        $materias = $nivel->materias;
        $aulas=Aula::all();
        $temas=Tema::all();
        $hora_inicio=Carbon::now()->isoFormat('HH:mm:ss');
        $hora_fin = Carbon::now()->addMinutes($programa->hora_ini->floatDiffInMinutes($programa->hora_fin))->isoFormat('HH:mm:ss');
        return view('clase.create',compact('docentes','programa','inscripcion','materias','aulas','hora_inicio','hora_fin','temas'));
    }

    public function guardarObservacion(Request $request){
        $observacion=new Observacion();
        $observacion->observacion=$request->observacion;
        $observacion->activo=1;
        $observacion->observable_id=$request->id_programacion;
        $observacion->observable_type= Programacion::class;
        $observacion->save();
        return response()->json($observacion);
    }

    public function programacionesFuturo(Request $request){
        $programacion=Programacion::join('docentes','docentes.id','=','programacions.docente_id')
                    ->join('aulas','aulas.id','=','programacions.aula_id')
                    ->join('inscripciones','inscripciones.id','=','programacions.inscripcione_id')
                    ->join('materias','materias.id','=','programacions.materia_id')
                    ->join('estados','estados.id','=','programacions.estado_id')
                    ->where('inscripcione_id',$request->inscripcion)
                    ->select('programacions.id','fecha','estados.estado','materia','docentes.nombre as docente','programacions.hora_ini','programacions.hora_fin','aulas.aula','programacions.habilitado')->get();
        return DataTables::of($programacion)
                ->addColumn('btn','programacion.actionsfuturo')
                ->rawColumns(['btn'])
                ->toJson();
    }

    public function controlAsitencia($inscripcion=1){
       // $inscripcion=1;
        $programacion=Programacion::join('inscripciones','inscripciones.id','=','programacions.inscripcione_id')
                    ->join('estados','estados.id','=','programacions.estado_id')
                    ->where('inscripcione_id',$inscripcion)
                    ->select('programacions.id','fecha','estados.estado','programacions.habilitado')->get();
        return DataTables::of($programacion)
                ->toJson();
    }

    public function asisntecia(Request $request){
        $estados=Inscripcione::join('programacions','programacions.inscripcione_id','inscripciones.id')
        ->join('estudiantes','estudiantes.id','inscripciones.estudiante_id')
        ->join('personas','personas.id','estudiantes.persona_id')
        ->join('estados','estados.id','programacions.estado_id')
        ->where('inscripciones.vigente',1)
        ->where('inscripciones.id',$request->inscripcione_id)
        ->select('personas.id','programacions.id as programacion_id','personas.nombre','personas.apellidop','estados.estado')
        ->orderBy('programacions.id','asc')
        ->get();
        return response()->json($estados);
    }
    public function asignarFaltasFechasPasadas(){
        Programacion::where('fecha','<',Carbon::now()->format('Y-m-d'))
                    ->where('estado_id',Config::get('constantes.ESTADO_INDEFINIDO'))->update(['estado_id'=>Config::get('constantes.ESTADO_FALTA')]);
        return response()->json(['id'=>"Todo Bien"]);
    }

    public function hoy(){
        $programas= Programacion::join('inscripciones','inscripciones.id','programacions.inscripcione_id')
        ->join('estudiantes','estudiantes.id','inscripciones.estudiante_id')
        ->join('personas','personas.id','estudiantes.persona_id')
        ->join('docentes','programacions.docente_id','docentes.id')
        ->join('materias','programacions.materia_id','materias.id')
        ->join('estados','programacions.estado_id','estados.id')

        ->where('programacions.fecha',Carbon::now()->format('Y-m-d'))
        ->select('personas.id','personas.nombre as estudiante','estados.estado','personas.apellidop','foto','docentes.nombre as docente','programacions.hora_ini','programacions.hora_fin','materias.materia')  
        ->get();

        return DataTables::of($programas)
                ->addColumn('btn','programacion.actionshoy')
                ->rawColumns(['btn'])
                ->toJson();
    }

}