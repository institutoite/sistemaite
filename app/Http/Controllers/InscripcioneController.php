<?php

namespace App\Http\Controllers;

use App\Inscripcione;
use App\Modalidad;
use App\Motivo;
use App\Persona;
use App\Materia;
use App\Aula;
use App\Models\Sesion;
use App\Dia;
use App\Docente;
use App\Estudiante;
use App\Programacion;

use Carbon\Carbon;
use DB;

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
        $inscripcion->fechaini=$request->fechaini;
        $inscripcion->fechafin = $request->fechaini;
        $inscripcion->totalhoras=$request->totalhoras;
        $inscripcion->costo=$request->costo;
        $inscripcion->vigente=1;
        $inscripcion->condonado=0;
        $inscripcion->objetivo=$request->objetivo;
        $inscripcion->estudiante_id=$request->estudiante_id;
        $inscripcion->modalidad_id=$request->modalidad_id;
        $inscripcion->motivo_id=$request->motivo_id;
        $inscripcion->save();
        $materias = Materia::get();
        $aulas = Aula::get();
        $docentes = Docente::get();
        $dias = Dia::get();
        $tipo = 'guardando';
        return view('inscripcione.configurar',compact('inscripcion','materias','aulas','docentes','tipo','dias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */



    public function show($inscripciones_id)
    {
        $inscripcione = Inscripcione::find($inscripciones_id);
        $programacion = Programacion::join('materias', 'programacions.materia_id', '=', 'materias.id')
        ->join('aulas', 'programacions.aula_id', '=', 'aulas.id')
        ->join('docentes', 'programacions.docente_id', '=', 'docentes.id')
        ->join('personas', 'personas.id', '=', 'docentes.persona_id')
        ->select('programacions.fecha', 'hora_ini', 'hora_fin', 'horas_por_clase', 'personas.nombre', 'materias.materia', 'aulas.aula', 'programacions.habilitado', 'programacions.inscripcione_id')
        ->orderBy('fecha', 'asc')
        ->where('inscripcione_id', '=', $inscripciones_id)->get();

        return view('inscripcione.show', compact('inscripcione','programacion'));
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
        
        $inscripcione->fechaini = $request->fechaini;
        //$inscripcione->fechafin = $request->fechaini;
        $inscripcione->totalhoras = $request->totalhoras;
        $inscripcione->costo = $request->costo;
        
        $inscripcione->vigente = 1;
        $inscripcione->condonado = 0;
        $inscripcione->objetivo = $request->objetivo;
        
        $inscripcione->estudiante_id = $request->estudiante_id;
        $inscripcione->modalidad_id = $request->modalidad_id;
        $inscripcione->motivo_id = $request->motivo_id;
        $inscripcione->save();

        $inscripcion=$inscripcione;

        $materias = Materia::get();
        $aulas = Aula::get();
        $docentes = Docente::get();
        $dias = Dia::get();
        $tipo='actualizando';
        return view('inscripcione.configurar', compact('inscripcion', 'materias', 'aulas', 'docentes','tipo','dias'));
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
        $inscripciones = Inscripcione::where('estudiante_id', '=', $persona->estudiante->id)->select('id','objetivo','costo')->get();
        return view('inscripcione.tusinscripciones',compact('persona','inscripciones'));
    }

    public function tusinscripciones($estudiante_id){
        $inscripciones=Inscripcione::where('estudiante_id', '=', $estudiante_id)->select('id', 'objetivo', 'costo')->get();
        $persona=Estudiante::findOrFail($estudiante_id)->persona;
        return view('inscripcione.tusinscripciones',compact('inscripciones','persona'));
        
    }

    public function guardarconfiguracion(Request $request,$id){
        $inscripcion=Inscripcione::findOrFail($id);
        $cuantas_sesiones=count($request->dias);
        $i=0;
        //dd($cuantas_sesiones);
        while($i<$cuantas_sesiones){
            $sesion=new Sesion();
            $sesion->horainicio=$request->horainicio[$i];
            $sesion->horafin=$request->horafin[$i];
            $sesion->dia_id=$request->dias[$i];
            $sesion->docente_id=$request->docentes[$i];
            $sesion->materia_id=$request->materias[$i];
            $sesion->aula_id=$request->aulas[$i];
            $sesion->inscripcione_id=$id;
            $sesion->save();
            $i=$i+1;
        }
            $pagos=$inscripcion->pagos();
        return view('pago.create',compact('inscripcion','pagos'));
    }

    public function actualizarConfiguracion(Request $request, $id)
    {
        $cuantas_sesiones = count($request->dias);
        $fecha=$request->fecha;
        Sesion::where('inscripcione_id', '=', $id)->delete();
        $inscripcion = Inscripcione::findOrFail($id);
        if($fecha<$inscripcion->fechaini){
            $inscripcion->fechaini=$fecha;
        }
        $i = 0;
        while ($i < $cuantas_sesiones) {
            $sesion = new Sesion();
            $sesion->horainicio = $request->horainicio[$i];
            $sesion->horafin = $request->horafin[$i];
            $sesion->dia_id = $request->dias[$i];
            $sesion->docente_id = $request->docentes[$i];
            $sesion->materia_id = $request->materias[$i];
            $sesion->aula_id = $request->aulas[$i];
            $sesion->inscripcione_id = $id;
            $sesion->save();
            $i = $i + 1;
        }
        return redirect()->route('regenerar.programa', ['inscripcione'=>$inscripcion->id,'fecha'=>$fecha]);   
    }


    public function actualizar_fecha_proximo_pago($fecha,$id){
        $inscripcion=Inscripcione::findOrFail($id);
        $inscripcion->fecha_proximo_pago=$fecha;
        $inscripcion->save();

        return redirect()->route('imprimir.programa',$inscripcion->id);
    }

    

    public function inscripcionesVigentes($persona_id){
        $estudiante_id=Persona::findOrFail($persona_id)->estudiante->id;
        $inscripcionesVigentes=Inscripcione::
                                        where('estudiante_id','=',$estudiante_id)
                                        ->where('vigente','=',1)->get();
        switch ($inscripcionesVigentes->count()) {
            case 0:
                return redirect()->route('listar_inscripciones',$persona_id);
                break;
            case 1:
                return redirect()->route('clases.marcado.general',$inscripcionesVigentes[0]->id);
                break;
            default:
                return redirect()->route('listar_inscripciones', $persona_id);
                break;
        }
    }

}
