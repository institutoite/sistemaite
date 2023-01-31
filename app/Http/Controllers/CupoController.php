<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\DocenteController;

class CupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cupos.index');
    }
    public function getDataCupos(){
        $unaFecha=Carbon::now()->format('Y-m-d'); 
        //$data['datos'][]=[];
        //$data['docente'][]=[];
        $ObjetoDocente=new DocenteController();
        $docentes=$ObjetoDocente->docentesEstado("HABILITADO");
        
        foreach ($docentes as $docente) {
            $cuposDeUnDocente=$this->getCupo($unaFecha,$docente->id);
            //dd($cuposDeUnDocente);
            if(count($cuposDeUnDocente)>0){
                $data["docente"][]=$docente;
                $data['datos'][]=$cuposDeUnDocente;
            }
        }

        $data['data']=json_encode($data);
        return response()->json($data);
    }

    public function getCupo($unaFecha,$unDocente){
        $data['label'][]=[];
        $data['cantidad'][]=[];
        $horarios=$this->cupos($unaFecha,$unDocente);
        foreach ($horarios as $elemento) {
            $data['label'][]=$elemento->hora_ini->isoFormat('H:mm').'-'.$elemento->hora_fin->isoFormat('H:mm');
            $data['cantidad'][]=$elemento->cantidad;
        }
        $data['data']=json_encode($data);
        return $data;
    }

    public function cupos($unaFecha,$unDocente){
        //dd($unDocente);
        $cupos=Programacion::join('docentes','docentes.id','programacions.docente_id')
            ->join('materias','materias.id','programacions.materia_id')
            ->join('aulas','aulas.id','programacions.aula_id')
            // ->where('fecha','=',Carbon::now()->format('Y-m-d'))
            ->where('fecha','=',$unaFecha)
            ->where('docentes.id',$unDocente) // un docente sin esto es para todos los docentes 
            ->select('hora_ini','hora_fin','docentes.nombrecorto',DB::raw('count(*) as cantidad'))
            ->groupBy('docentes.nombrecorto','hora_ini','hora_fin')
            ->orderBy('hora_ini','asc')
        ->get();
        
        return $cupos;
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
