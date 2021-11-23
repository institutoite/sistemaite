<?php

namespace App\Http\Controllers;

use App\Models\Clasecom;
use App\Models\Programacioncom;
use App\Models\Matriculacion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClasecomController extends Controller
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
     * @param  \App\Models\Clasecom  $clasecom
     * @return \Illuminate\Http\Response
     */
    public function show(Clasecom $clasecom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clasecom  $clasecom
     * @return \Illuminate\Http\Response
     */
    public function edit(Clasecom $clasecom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clasecom  $clasecom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clasecom $clasecom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clasecom  $clasecom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clasecom $clasecom)
    {
        //
    }
    public function marcadoGeneral($matriculacion_id){
       
        
        $programaciones=Programacioncom::where('matriculacion_id', '=', $matriculacion_id)->get();
        $programacionesHoy = Programacioncom::join('matriculacions', 'matriculacions.id', '=', 'programacioncoms.matriculacion_id') //ok
        ->join('sesioncoms', 'sesioncoms.matriculacion_id', '=', 'matriculacions.id')
        ->join('dias', 'dias.id', '=', 'sesioncoms.dia_id')
        ->join('aulas', 'sesioncoms.aula_id', '=', 'aulas.id')
        ->join('docentes', 'sesioncoms.docente_id', '=', 'docentes.id')
        ->join('personas', 'docentes.persona_id', '=', 'personas.id')
        ->where('matriculacions.id', '=', $matriculacion_id)
        ->where('programacioncoms.fecha', '=',DB::raw('date(now())'))
            ->where('dias.id', '=', DB::raw("DAYOFWEEK(programacioncoms.fecha)-1"))
            
        ->select('programacioncoms.id', 'programacioncoms.fecha', 'programacioncoms.estado', 'programacioncoms.horaini', 'programacioncoms.horafin', 'programacioncoms.habilitado', 'personas.nombre','programacioncoms.docente_id')
        ->get();
        $matriculacion=Matriculacion::findOrFail($matriculacion_id);
        $dias_que_faltan_para_pagar= $matriculacion->fecha_proximo_pago->diffInDays(now());
        
        $pago=$matriculacion->pagos->sum('monto');
        $faltas=Programacioncom::where('estado','=','FALTA')->count();
        $presentes = Programacioncom::where('estado', '=', 'PRESENTE')->count();
        $finalizados = Programacioncom::where('estado', '=', 'FINALIZADO')->count();
        $licencias = Programacioncom::where('estado', '=', 'LICENCIA')->count();
         
        return view('programacioncom.marcadoGeneral',compact('programaciones', 'faltas', 'presentes', 'licencias', 'pago', 'matriculacion', 'dias_que_faltan_para_pagar'));
        //return redirect()->route('clases.marcado.general',$inscripcion_id)->with('programaciones', 'programacionesHoy', 'faltas', 'presentes', 'licencias', 'pago', 'inscripcion','dias_que_faltan_para_pagar');
    }
}
