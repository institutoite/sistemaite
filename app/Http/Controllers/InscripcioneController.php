<?php

namespace App\Http\Controllers;

use App\Inscripcione;
use App\Modalidad;
use App\Motivo;
use App\Persona;
use App\Materia;
use App\Aula;
use App\Docente;
use App\Estudiante;
use App\Programacion;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

use Illuminate\Http\Request;

/**
 * Class InscripcioneController
 * @package App\Http\Controllers
 */
class InscripcioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripciones = Inscripcione::paginate();

        return view('inscripcione.index', compact('inscripciones'))
            ->with('i', (request()->input('page', 1) - 1) * $inscripciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalidades = Modalidad::all();
        $motivos = Motivo::all();

        //desde el menu puede enviar el objeto persona a create:
        return view('inscripcione.create', compact('modalidades','motivos'));
    }

    public function crear(Persona $persona)
    {
        $modalidades = Modalidad::all();
        $motivos = Motivo::all();
        $ultima_inscripcion=Inscripcione::where('estudiante_id','=',$persona->id)->orderBy('id','desc')->first();
        //desde el menu puede enviar el objeto persona a create:
        return view('inscripcione.create', compact('modalidades', 'motivos','persona','ultima_inscripcion'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inscripcione::$rules);
        $inscripcion=new Inscripcione();
        $inscripcion->horainicio=$request->horainicio;
        $inscripcion->horafin=$request->horafin;

        $inscripcion->fechaini=$request->fechaini;
        $inscripcion->fechafin = $request->fechaini;
        
        $inscripcion->totalhoras=$request->totalhoras;
        $inscripcion->costo=$request->costo;
        $inscripcion->horasxclase= 2 ;
        
        $inscripcion->vigente=1;
        $inscripcion->condonado=0;
        $inscripcion->objetivo=$request->objetivo;

        
        $inscripcion->lunes=($request->lunes) ? '1' : '0';
        $inscripcion->martes=($request->martes) ? '1' : '0';
        $inscripcion->miercoles=($request->miercoles) ? '1' : '0';
        $inscripcion->jueves=($request->jueves) ? '1' : '0';
        $inscripcion->viernes=($request->viernes) ? '1' : '0';
        $inscripcion->sabado=($request->sabado) ? '1' : '0';
        
        $inscripcion->estudiante_id=$request->estudiante_id;
        $inscripcion->modalidad_id=$request->modalidad_id;
        $inscripcion->motivo_id=$request->motivo_id;
        $inscripcion->save();
        
        //dd($inscripcion);

        $materias = Materia::get();
        $aulas = Aula::get();
        $docentes = Docente::get();
        $tipo = 'guardando';
        return view('inscripcione.configurar',compact('inscripcion','materias','aulas','docentes','tipo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */



    public function show($id)
    {
        $inscripcione = Inscripcione::find($id);

        return view('inscripcione.show', compact('inscripcione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscripcione = Inscripcione::find($id);
        $persona=$inscripcione->estudiante->persona;
        $ultima_inscripcion=$inscripcione;
        $modalidades = Modalidad::all();
        $motivos = Motivo::all();
        return view('inscripcione.edit', compact('inscripcione','persona', 'ultima_inscripcion','modalidades','motivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inscripcione $inscripcione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcione $inscripcione)
    {
        //dd($request->all());
        request()->validate(Inscripcione::$rules);
        $inscripcione->horainicio = $request->horainicio;
        $inscripcione->horafin = $request->horafin;
        $inscripcione->fechaini = $request->fechaini;
        //$inscripcione->fechafin = $request->fechaini;
        $inscripcione->totalhoras = $request->totalhoras;
        $inscripcione->costo = $request->costo;
        $inscripcione->horasxclase = $inscripcione->horafin->diffInHours($inscripcione->horainicio); 
        $inscripcione->vigente = 1;
        $inscripcione->condonado = 0;
        $inscripcione->objetivo = $request->objetivo;
        $inscripcione->lunes = ($request->lunes) ? '1' : '0';
        $inscripcione->martes = ($request->martes) ? '1' : '0';
        $inscripcione->miercoles = ($request->miercoles) ? '1' : '0';
        $inscripcione->jueves = ($request->jueves) ? '1' : '0';
        $inscripcione->viernes = ($request->viernes) ? '1' : '0';
        $inscripcione->sabado = ($request->sabado) ? '1' : '0';

        $inscripcione->estudiante_id = $request->estudiante_id;
        $inscripcione->modalidad_id = $request->modalidad_id;
        $inscripcione->motivo_id = $request->motivo_id;
        $inscripcione->save();

        $inscripcion=$inscripcione;

        $materias = Materia::get();
        $aulas = Aula::get();
        $docentes = Docente::get();
        $tipo='actualizando';
        return view('inscripcione.configurar', compact('inscripcion', 'materias', 'aulas', 'docentes','tipo'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inscripcione = Inscripcione::find($id)->delete();

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripcione deleted successfully');
    }

    public function listar(Persona $persona){
        $persona=Persona::findOrFail($persona->id);
        return view('inscripcione.tusinscripciones',compact('persona'));
    }

    public function tusinscripciones($id){
        return datatables()->of(Inscripcione::where('estudiante_id','=',$id)->get()) ///
            ->addColumn('btn', 'inscripcione.action')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function guardarconfiguracion(Request $request,$id){
        // para sacar los dias
        $inscripcion=Inscripcione::findOrFail($id);
        /**Adjuntando los dias correspondiente  */
        if($inscripcion->lunes){
            $inscripcion->dias()->attach([1]);
        }
        if($inscripcion->martes){
            $inscripcion->dias()->attach([2]);
        }
        if($inscripcion->miercoles){
            $inscripcion->dias()->attach([3]);
        }
        if($inscripcion->jueves){
            $inscripcion->dias()->attach([4]);
        }
        if($inscripcion->viernes){
            $inscripcion->dias()->attach([5]);
        }
        if($inscripcion->sabado){
            $inscripcion->dias()->attach([6]);
        }
        /** adjuntando los docentes correspondientes */
            $inscripcion->docentes()->attach($request->docente);
        /** adjuntando aulas a las inscripciones */
            $inscripcion->aulas()->attach($request->aula);
        /** adjuntando materias a las inscripciones*/
            $inscripcion->materias()->attach($request->materia);
            $pagos=$inscripcion->pagos();
        return view('pago.create',compact('inscripcion','pagos'));
    }

    public function actualizarConfiguracion(Request $request, $id)
    {
        

        // para sacar los dias
        $inscripcion = Inscripcione::findOrFail($id);
        /**Adjuntando los dias correspondiente  */
        
        
        $inscripcion->dias()->sync([]);

        //dd($inscripcion->id);
      
       
        if ($inscripcion->lunes) {
            $inscripcion->dias()->attach([1]);
        }
        if ($inscripcion->martes) {
            $inscripcion->dias()->attach([2]);
        }
        if ($inscripcion->miercoles) {
            $inscripcion->dias()->attach([3]);
        }
        if ($inscripcion->jueves) {
            $inscripcion->dias()->attach([4]);
        }
        if ($inscripcion->viernes) {
            $inscripcion->dias()->attach([5]);
        }
        if ($inscripcion->sabado) {
            $inscripcion->dias()->attach([6]);
        }

        
        /** adjuntando los docentes correspondientes */
        $inscripcion->docentes()->sync([]);
        $inscripcion->docentes()->sync($request->docente);
        
        /** adjuntando aulas a las inscripciones */
        $inscripcion->aulas()->sync([]);
        $inscripcion->aulas()->sync($request->aula);
        
        /** adjuntando materias a las inscripciones*/
        $inscripcion->materias()->sync([]);
        $inscripcion->materias()->sync($request->materia);
        //dd($request->materia);
        
        //dd($inscripcion);
        //$pagos = $inscripcion->pagos();
        return redirect()->route('mostrar.programa',$inscripcion);
    }


    public function actualizar_fecha_proximo_pago($fecha,$id){
        $inscripcion=Inscripcione::findOrFail($id);
        $inscripcion->fecha_proximo_pago=$fecha;
        $inscripcion->save();

        /** esto tiene que ir a una ruta el cual pueda ser llamado desde cualquier lugare adena
         * deberia de estar enb programacionController.
         */

        $programacion = Programacion::join('materias', 'programacions.materia_id', '=', 'materias.id')
        ->join('aulas', 'programacions.aula_id', '=', 'aulas.id')
        ->join('docentes', 'programacions.docente_id', '=', 'docentes.id')
        ->join('personas', 'personas.id', '=', 'docentes.persona_id')
        ->select('programacions.fecha', 'hora_ini', 'hora_fin', 'personas.nombre', 'materias.materia', 'aulas.aula', 'programacions.habilitado')
        ->orderBy('fecha', 'asc')
        ->where('inscripcion_id', '=', $id)->get();
        
        $pdf = PDF::loadView('programacion.reporte',compact('programacion'));

        /**entrae a la persona al cual corresponde esta inscripcion */
        $estudiante=Estudiante::findOrFail($inscripcion->estudiante_id);
        $persona=$estudiante->persona;
        $fecha_actual= Carbon::now();
        $fecha_actual->isoFormat('DD-MM-YYYY-HH:mm:ss');
        return $pdf->download($persona->id.'_'.$fecha_actual.'_'.$persona->nombre.'_'.$persona->apellidop.'.pdf');

    }
}
