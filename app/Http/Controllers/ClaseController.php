<?php

namespace App\Http\Controllers;

use SweetAlert;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Inscripcione;
use App\Models\Clase;
use App\Models\Programacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\ToSweetAlert;
use UxWeb\SweetAlert\SweetAlert as SweetAlertSweetAlert;

/**
 * Class ClaseController
 * @package App\Http\Controllers
 */
class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = Clase::paginate();

        return view('clase.index', compact('clases'))
            ->with('i', (request()->input('page', 1) - 1) * $clases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clase = new Clase();
        return view('clase.create', compact('clase'));
    }
    public function crear()
    {
        
        return view('clase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $clase = Clase::create($request->all());
        return redirect()->route('clases.index')
            ->with('success', 'Clase created successfully.');
    }

    public function guardar(Request $request,$programacion_id){
        //dd($request->all());

        $clase=new Clase();
        $clase->fecha=$request->fecha;
        $clase->estado="PRESENTE";
        $clase->horainicio=$request->horainicio;
        $clase->horafin=$request->horafin;
        $clase->docente_id=$request->docente_id;
        $clase->materia_id=$request->materia_id;
        $clase->aula_id=$request->aula_id;
        $clase->programacion_id=$programacion_id;
        $clase->save();
        $programa=Programacion::findOrFail($programacion_id);
        $programa->estado = 'PRESENTE';
        $programa->save();
        return redirect('/home')->with('mensaje', 'MarcadoCorrectamente');  
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clase = Clase::find($id);

        return view('clase.show', compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clase = Clase::find($id);

        return view('clase.edit', compact('clase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Clase $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clase $clase)
    {
       // request()->validate(Clase::$rules);

        $clase->update($request->all());

        return redirect()->route('clases.index')
            ->with('success', 'Clase updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $clase = Clase::find($id)->delete();

        return redirect()->route('clases.index')
            ->with('success', 'Clase deleted successfully');
    }
    public function marcadoGeneral($inscripcion_id){
            //dd($inscripcion_id);
        $programaciones=Programacion::join('inscripciones','inscripciones.id','=','programacions.inscripcione_id')//ok
            ->join('sesions','sesions.inscripcione_id','=','inscripciones.id')
            ->join('materias','sesions.materia_id','=','materias.id')
            ->join('dias', 'dias.id', '=', 'sesions.dia_id')
            ->join('aulas','sesions.aula_id','=','aulas.id')
            ->join('docentes','sesions.docente_id','=','docentes.id')
            ->join('personas','docentes.persona_id','=','personas.id')
            ->where('inscripciones.id','=',$inscripcion_id)
            ->where('dias.id','=',DB::raw("DAYOFWEEK(programacions.fecha)-1"))
            ->select('programacions.id', 'fecha', 'programacions.estado', 'hora_ini', 'hora_fin','programacions.habilitado', 'personas.nombre','materia')
            ->get();
        $programacionesHoy = Programacion::join('inscripciones', 'inscripciones.id', '=', 'programacions.inscripcione_id') //ok
        ->join('sesions', 'sesions.inscripcione_id', '=', 'inscripciones.id')
        ->join('materias', 'sesions.materia_id', '=', 'materias.id')
        ->join('dias', 'dias.id', '=', 'sesions.dia_id')
        ->join('aulas', 'sesions.aula_id', '=', 'aulas.id')
        ->join('docentes', 'sesions.docente_id', '=', 'docentes.id')
        ->join('personas', 'docentes.persona_id', '=', 'personas.id')
        ->where('inscripciones.id', '=', $inscripcion_id)
        ->where('programacions.fecha', '=',DB::raw('date(now())'))
            ->where('dias.id', '=', DB::raw("DAYOFWEEK(programacions.fecha)-1"))
            
        ->select('programacions.id', 'programacions.fecha', 'programacions.estado', 'hora_ini', 'hora_fin', 'programacions.habilitado', 'personas.nombre', 'materia','programacions.docente_id','programacions.materia_id')
        ->get();
        $inscripcion=Inscripcione::findOrFail($inscripcion_id);
        $dias_que_faltan_para_pagar= $inscripcion->fecha_proximo_pago->diffInDays(now());
        
        $pago=$inscripcion->pagos->sum('monto');
        $faltas=Programacion::where('estado','=','FALTA')->count();
        $presentes = Programacion::where('estado', '=', 'PRESENTE')->count();
        $finalizados = Programacion::where('estado', '=', 'FINALIZADO')->count();
        $licencias = Programacion::where('estado', '=', 'LICENCIA')->count();
        
        return view('programacion.marcadoGeneral',compact('programaciones', 'programacionesHoy', 'faltas', 'presentes', 'licencias', 'pago', 'inscripcion', 'dias_que_faltan_para_pagar'));
        //return redirect()->route('clases.marcado.general',$inscripcion_id)->with('programaciones', 'programacionesHoy', 'faltas', 'presentes', 'licencias', 'pago', 'inscripcion','dias_que_faltan_para_pagar');
    }
    
    public function marcadoRapido($programacion_id){
        $programa = Programacion::findOrFail($programacion_id);
        $clase=new Clase();
        $clase->fecha           =$programa->fecha;
        $clase->estado          ='PRESENTE';
        $clase->horainicio      =Carbon::now()->isoFormat('HH:mm:ss');
        $clase->horafin         =Carbon::now()->addHours($programa->hora_ini->floatDiffInHours($programa->hora_fin));
        $clase->docente_id      =$programa->docente_id;
        $clase->materia_id      =$programa->materia_id;
        $clase->aula_id         =$programa->aula_id;
        $clase->tema_id         =1; // tema por 
        $clase->programacion_id =$programa->id;
        $programa->estado='PRESENTE';
        $programa->save();
        $clase->save();
        return redirect('/home')->with('mensaje', 'MarcadoCorrectamente');
    }
    public function clasesPresentes(){
        $clases=Clase::where('estado','PRESENTE')
                    ->get();
        return view('clase.presentes',compact('clases'));
    }

    public function finalizarClase($clase_id)
    {
        $clase=Clase::findOrFail($clase_id);
        $programa=$clase->programacion;
        $programa->estado="FINALIZADO";
        $programa->save();
        $clase->estado="FINALIZADO";
        $clase->save();
        //return redirect()->action(ClaseController::class,'clasesPresentes');
    } 

    
}