<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Felicitado;
use App\Models\Inscripcione;
use App\Models\Mensajeable;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
class EstudianteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Estudiantes')->only("cumplenerosView","historia","cumpleaneros","faltonesView","sinfaltaView","recordatorioView","finalizandoView","empezandoView");
        $this->middleware('can:Crear Estudiantes')->only("store","show");
        $this->middleware('can:Editar Estudiantes')->only("edit","update");
        $this->middleware('can:Eliminar Estudiantes')->only("destroy");
    }
    public function cumplenerosView()
    {
        return view('estudiantes.cumpleaneros');
    }
    public function historia($estudiante_id)
    {
        $grados=Estudiante::join('estudiante_grado','estudiantes.id','=','estudiante_grado.estudiante_id')
            ->join('grados','grados.id','=','estudiante_grado.grado_id')
            ->join('colegios','colegios.id','=','estudiante_grado.colegio_id')
            ->select('estudiantes.id','colegio_id','colegios.nombre','grados.grado','anio')
            ->orderBy('anio', 'desc')
            ->get();
        return view('estudiantes.historiaacademica',compact('grados','estudiante_id'));
    }
    public function cumpleaneros(Request $request){
        $cumpleaneros=Persona::join('estudiantes','estudiantes.persona_id','personas.id')
  			->whereMonth('fechanacimiento', '=', Carbon::now()->add($request->dias, 'day')->format('m'))
                ->whereDay('fechanacimiento', '=', Carbon::now()->add($request->dias, 'day')->format('d'))
                ->whereNotIn('personas.id',Felicitado::where('anio',Carbon::now()->year)->select('persona_id')->get()->toArray())
  			->select('personas.id','nombre','apellidop','apellidom','foto','telefono',DB::raw("(SELECT TIMESTAMPDIFF(YEAR,fechanacimiento,CURDATE()) AS viejo FROM personas where personas.id=estudiantes.persona_id GROUP BY nombre,fechanacimiento) as edad"))
                ->groupBy('personas.id','nombre','fechanacimiento','apellidop','apellidom','foto','telefono','edad')
                ->get();
        return DataTables::of($cumpleaneros)
            ->addColumn('btn','estudiantes.action')
            ->rawColumns(['btn'])
            ->toJson(); 
    }

    public function estudiantesFaltones()
    {
        $faltones=Persona::join('estudiantes','personas.id','estudiantes.persona_id')
                ->join('inscripciones','inscripciones.estudiante_id','estudiantes.id')
                ->join('programacions','programacions.inscripcione_id','inscripciones.id')
                ->join('estados','estados.id','programacions.estado_id')
                ->join('userables','userables.userable_id','inscripciones.id')
                ->join('users','users.id','userables.user_id')
                ->where('userables.userable_type',Inscripcione::class)
                ->where('estados.estado','FALTA')
                ->where('inscripciones.vigente',1)
                ->select('personas.id','programacions.id as programacion_id','nombre','apellidop','apellidom','telefono','users.name','personas.foto')
                ->get();
        return DataTables::of($faltones)
        ->addColumn('btn','estudiantes.actionfaltones')
        ->rawColumns(['btn'])
        ->toJson(); 
    }
    public function estudiantesSinFalta()
    {
            $InscripcionesConFalta=Persona::join('estudiantes','personas.id','estudiantes.persona_id')
                ->join('inscripciones','inscripciones.estudiante_id','estudiantes.id')
                ->join('programacions','programacions.inscripcione_id','inscripciones.id')
                ->join('estados','estados.id','programacions.estado_id')
                ->join('userables','userables.userable_id','inscripciones.id')
                ->join('users','users.id','userables.user_id')
                ->where('userables.userable_type',Inscripcione::class)
                ->where('estados.estado','=','FALTA')
                ->orWhere('estados.estado','=','FALTANOTIFICADA')
  				->where('inscripciones.vigente',1)
                ->select('inscripciones.id')
                ->get();
            $InscripcionesSinFalta=Inscripcione::whereNotIn('inscripciones.id',$InscripcionesConFalta)
                ->where('inscripciones.vigente',1)
                ->select('inscripciones.id')		
                ->get();

            $PersonasSinFalta=Persona::join('estudiantes','estudiantes.persona_id','personas.id')
                ->join('inscripciones','inscripciones.estudiante_id','estudiantes.id')
                ->join('userables','userables.userable_id','inscripciones.id')
                ->join('users','users.id','userables.user_id')
                ->where('userables.userable_type',Inscripcione::class)
                ->whereIn('inscripciones.id',$InscripcionesSinFalta)
                ->select('personas.id','nombre','apellidop','apellidom','telefono','users.name','personas.foto')
                ->get();

            return DataTables::of($PersonasSinFalta)
            ->addColumn('btn','estudiantes.actionsinfalta')
            ->rawColumns(['btn'])
            ->toJson(); 
    }
    
    public function estudiantesFinalizando(){
        $inscripcionesFinalizadas=Mensajeable::where('mensajeable_type',Inscripcione::class)
            ->where('mensaje_id',idMensaje('FINALIZANDOINSCRIPCION'))
            ->select('mensajeable_id')
            ->get();

        $finalizan=Persona::join('estudiantes', 'estudiantes.persona_id','personas.id')
        ->join('inscripciones','inscripciones.estudiante_id','estudiantes.id')
        ->join('userables','userables.userable_id','inscripciones.id')
        ->join('users','users.id','userables.user_id')
        ->where('userables.userable_type',Inscripcione::class)
        ->where('inscripciones.vigente',1)
        ->where('inscripciones.condonado',0)
        ->whereNotIn('inscripciones.id',$inscripcionesFinalizadas)
        ->select('personas.id','inscripciones.id as inscripcione_id','nombre','apellidop','apellidom','fechafin','telefono','personas.foto','users.name as usuario')
        ->orderBy('fechafin','asc')
        ->get();
        //  dd($finalizan);

        return DataTables::of($finalizan)
            ->addColumn('btn','estudiantes.actionfinalizando')
            ->rawColumns(['btn'])
            ->toJson(); 
    }
    public function estudiantesEmpezando(){
        $inscripcionesEmpezados=Mensajeable::where('mensajeable_type',Inscripcione::class)
            ->where('mensaje_id',idMensaje('EMPEZANDOINSCRIPCION'))
            ->select('mensajeable_id')
            ->get();

        $finalizan=Persona::join('estudiantes', 'estudiantes.persona_id','personas.id')
        ->join('inscripciones','inscripciones.estudiante_id','estudiantes.id')
        ->join('userables','userables.userable_id','inscripciones.id')
        ->join('users','users.id','userables.user_id')
        ->where('userables.userable_type',Inscripcione::class)
        ->where('inscripciones.vigente',1)
        ->where('inscripciones.condonado',0)
        ->whereNotIn('inscripciones.id',$inscripcionesEmpezados)
        ->select('personas.id','inscripciones.id as inscripcione_id','nombre','apellidop','apellidom','fechaini','telefono','personas.foto','users.name as usuario')
        ->orderBy('fechaini','asc')
        ->get();
        //  dd($finalizan);

        return DataTables::of($finalizan)
            ->addColumn('btn','estudiantes.actionempezando')
            ->rawColumns(['btn'])
            ->toJson(); 
    }

    
    public function faltonesView()
    {
        return view('estudiantes.faltones');
    }
    public function sinfaltaView()
    {
        return view('estudiantes.sinfalta');
    }
    public function recordatorioView()
    {
        return view('estudiantes.recordatorio');
    }
  
    public function finalizandoView()
    {
        return view('estudiantes.finalizando');
    }
    public function empezandoView()
    {
        return view('estudiantes.empezando');
    }
  
    public function store(Request $request)
    {

    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
    public function ultimoAnio(Estudiante $estudiante)
    {
        if(!is_null($estudiante->grados()->first())){ 
            return $estudiante->grados()->orderBy('anio', 'desc')->get()->first()->pivot->anio;
        }else{
            return null;
        }
    }

    public function yaEstaGestionado(Estudiante $estudiante)
    {
        $ultimoAnio=$this->ultimoAnio($estudiante);
        //dd($ultimoAnio == Carbon::now()->isoFormat('Y'));
        if (is_null($ultimoAnio)) {
            return false;
        } else {
            if ($ultimoAnio == Carbon::now()->isoFormat('Y')) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    

    
}
