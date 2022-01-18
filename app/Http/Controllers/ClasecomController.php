<?php

namespace App\Http\Controllers;

use App\Models\Clasecom;
use App\Models\Programacioncom;
use App\Models\Matriculacion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;


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
  
    public function guardar(Request $request,$programacioncom_id){
        dd($request->all());
        $clase=new Clase();
        $clase->fecha=$request->fecha;
        $clase->estado="PRESENTE";
        $clase->horainicio=$request->horainicio;
        $clase->horafin=$request->horafin;
        $clase->docente_id=$request->docente_id;
        $clase->materia_id=$request->materia_id;
        $clase->aula_id=$request->aula_id;
        $clase->tema_id =1;
        $clase->programacion_id=$programacion_id;
        $clase->save();

        $clase->userable()->create(['user_id' => Auth::user()->id]);

        $programa=Programacion::findOrFail($programacion_id);
        $programa->estado = 'PRESENTE';
        $programa->save();
        return redirect()->route('clase.presentes');
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
            
        ->select('programacioncoms.id', 'programacioncoms.fecha', 'programacioncoms.estado','aulas.aula' ,'programacioncoms.horaini', 'programacioncoms.horafin', 'programacioncoms.habilitado', 'personas.nombre','programacioncoms.docente_id')
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
      public function marcadoRapido($programacioncom_id){
        $programa = Programacioncom::findOrFail($programacioncom_id);
        $clase=new Clasecom();
        $clase->fecha           =$programa->fecha;
        $clase->estado          ='PRESENTE';
        $clase->horainicio      =Carbon::now()->isoFormat('HH:mm:ss');
        $clase->horafin         =Carbon::now()->addHours($programa->horaini->floatDiffInHours($programa->horafin));
        $clase->docente_id      =$programa->docente_id;
        $clase->aula_id         =$programa->aula_id;
        $clase->programacioncom_id =$programa->id;
        $programa->estado='PRESENTE';
        $programa->save();
        $clase->save();
        return redirect()->route('clase.presentes')->with('mensaje', 'MarcadoCorrectamente');
    }
     public function clasesPresentes(Request $request){
        //if($request->ajax()){
            $clasecoms =  Clasecom::join('programacioncoms', 'clasecoms.programacioncom_id', '=', 'programacioncoms.id')
                ->join('matriculacions', 'programacioncoms.matriculacion_id', '=', 'matriculacions.id')
                ->join('computacions', 'matriculacions.computacion_id', '=', 'computacions.id')
                ->join('personas', 'computacions.persona_id', '=', 'personas.id')
                ->join('docentes', 'clasecoms.docente_id', '=', 'docentes.id')
                ->join('asignaturas', 'matriculacions.asignatura_id', '=', 'asignaturas.id')
                ->join('aulas', 'clasecoms.aula_id', '=', 'aulas.id')
                ->where('clasecoms.estado','PRESENTE')
                ->where('clasecoms.fecha',Carbon::now()->isoFormat('Y-M-D'))
                ->select('clasecoms.id','personas.id as codigo', 'personas.nombre as name','clasecoms.horainicio', 'clasecoms.horafin', 'docentes.nombre', 'asignaturas.asignatura', 'aulas.aula','personas.foto')->get();
            return datatables()->of($clasecoms)
                ->addColumn('btn', 'clasecom.action_marcar')
                ->rawColumns(['btn', 'foto'])
                ->toJson();
        //}
    }
}
