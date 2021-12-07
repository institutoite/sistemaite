<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigurarionInscripcionRequest;
use App\Models\Inscripcione;
use App\Models\Modalidad;
use App\Models\Motivo;
use App\Models\Persona;
use App\Models\Materia;
use App\Models\Aula;
use App\Models\Sesion;
use App\Models\Dia;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Programacion;
use App\Models\Matriculacion;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

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
        
        $motivos = Motivo::all();
        $ultima_inscripcion=Inscripcione::where('estudiante_id','=',$persona->id)->orderBy('id','desc')->first();

        //$ultima_grado_id=Gestion::where('estudiante_id',$persona->estudiante->id)->orderBy('id', 'desc')->first()->grado_id;
        //$ultimo_nivel=Nivel::findOrFail($ultima_grado_id);
        //$modalidades = Modalidad::where('nivel_id', '=', $ultimo_nivel)->get();
        if($ultima_inscripcion!=null)        
            $ultimo_nivel=Nivel::findOrFail(Modalidad::findOrFail($ultima_inscripcion->modalidad_id)->nivel_id);
        else {
            $ultimo_nivel=$persona->estudiante->grados->first()->nivel;
        }
        
        $modalidades = $ultimo_nivel->modalidades;
        // dd($modalidades);
        if($ultimo_nivel->nivel=='GUARDERIA'){
            return view('inscripcione.guarderia.create', compact('modalidades', 'motivos','persona','ultima_inscripcion'));
        }
        else{
            return view('inscripcione.create', compact('modalidades', 'motivos', 'persona', 'ultima_inscripcion'));
        }
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
        $datos=$request->all();
        $inscripcion=new Inscripcione();
        $inscripcion->fechaini=$request->fechaini;
        $inscripcion->fechafin = $request->fechaini;
        $inscripcion->fecha_proximo_pago = $request->fechaini;
        if(!is_null($request->horas_total)){
            $inscripcion->totalhoras=$request->horas_total;
        }else{
            $inscripcion->totalhoras = $request->totalhoras;
        }
        $inscripcion->costo=$request->costo;
        $inscripcion->vigente=1;
        $inscripcion->condonado=0; 
        $inscripcion->objetivo=$request->objetivo;
        $inscripcion->estudiante_id=$request->estudiante_id;
        $inscripcion->modalidad_id=$request->modalidad_id;
        $inscripcion->motivo_id=$request->motivo_id;
        $inscripcion->save();
        //dd($inscripcion);
        //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   %%%%%%%%%%%%%%%%*/
        $inscripcion->userable()->create(['user_id'=>Auth::user()->id]);
        $nivel=Nivel::findOrFail(Modalidad::findOrFail($inscripcion->modalidad_id)->nivel_id);
        $materias = $nivel->materias;
        $aulas = Aula::get();
        $docentes = $nivel->docentes;
        $dias = Dia::get();
        $tipo = 'guardando';    
        $programacion = $inscripcion->programaciones;
        if ($nivel->nivel=='GUARDERIA'){
            return view('inscripcione.configurar', compact('datos','nivel','inscripcion', 'materias', 'aulas', 'docentes', 'tipo', 'dias', 'programacion')); 
        }else{
            return view('inscripcione.configurar', compact('nivel','inscripcion', 'materias', 'aulas', 'docentes', 'tipo', 'dias', 'programacion')); 
        }
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
        $programacion=$inscripcione->programaciones;
        return view('inscripcione.configurar', compact('inscripcion', 'materias', 'aulas', 'docentes','tipo','dias','programacion'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inscripcion = Inscripcione::findOrFail($id);
        $inscripcion->delete();
        return redirect()->action([InscripcioneController::class, 'tusinscripciones'], ['estudiante_id' => $inscripcion->estudiante_id]);
        
    }

    public function listar(Persona $persona){
        $persona=Persona::findOrFail($persona->id);
        $inscripcionesVigentes = Inscripcione::join('pagos','pagos.pagable_id','=','inscripciones.id')
                                        ->where('estudiante_id', '=', $persona->estudiante->id)
                                        ->where('vigente',1)
                                        ->select('inscripciones.id','objetivo','costo',DB::raw("(SELECT sum(monto) FROM pagos WHERE pagos.pagable_id= inscripciones.id) as acuenta"))
                                        ->groupBy('inscripciones.id','objetivo','acuenta','costo')
                                        ->get();
        $inscripcionesOtras = Inscripcione::where('estudiante_id', '=', $persona->estudiante->id)
                                        ->where('vigente', 0)
                                        ->select('id', 'objetivo', 'costo')->get();
                            
        
        return redirect()->route('tus.inscripciones', ['estudiante_id'=>$persona->estudiante->id]);
    
        //return redirect()->action([InscripcioneController::class, 'tusinscripciones'], ['estudiante_id' => $persona->estudiante_id]);
    }

    public function tusinscripciones($estudiante_id){
        
        $inscripciones=Inscripcione::where('estudiante_id', '=', $estudiante_id)->select('id', 'objetivo', 'costo')->get();

        $persona=Estudiante::findOrFail($estudiante_id)->persona;
        $inscripcionesVigentes = Inscripcione::join('pagos', 'pagos.pagable_id', '=', 'inscripciones.id')
        ->where('estudiante_id', '=', $persona->estudiante->id)
            ->where('vigente', 1)
            ->select('inscripciones.id','vigente', 'objetivo', 'costo', DB::raw("(SELECT sum(monto) FROM pagos WHERE pagos.pagable_id= inscripciones.id) as acuenta"))
            ->groupBy('inscripciones.id', 'vigente','objetivo', 'acuenta', 'costo')
            ->get();
        $inscripcionesOtras = Inscripcione::where('estudiante_id', '=', $persona->estudiante->id)
            ->where('vigente', 0)
            ->select('id', 'objetivo', 'costo')->get();
        
        $matriculaciones=Matriculacion::where('computacion_id','=',$persona->computacion->id)->get();
        $matriculacionesVigentes=Matriculacion::where('computacion_id','=',$persona->computacion->id)->where('vigente',1)->get();
        $matriculacionesOtras=Matriculacion::where('computacion_id','=',$persona->computacion->id)->where('vigente',0)->get();

        return view('inscripcione.tusinscripciones',compact('inscripciones','persona','inscripcionesVigentes','inscripcionesOtras','matriculaciones','matriculacionesVigentes','matriculacionesOtras'));
    }

    public function guardarconfiguracion(Request $request,$id){
        $inscripcion=Inscripcione::find($id);
        $cuantas_sesiones=count($request->dias);
        $i=0;
        
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
        return redirect()->route('pagos.crear',['inscripcione'=>$inscripcion->id]);
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
        $inscripcionesTodas = Inscripcione::where('estudiante_id', '=', $estudiante_id)
                                        ->get();
        
        //dd($inscripcionesVigentes->count());
        switch ($inscripcionesVigentes->count()) {
            case 0:
                return redirect()->route('listar_inscripciones',$persona_id);
                break;
            case 1:
                return redirect()->route('clases.marcado.general',$inscripcionesVigentes[0]->id);
                break;
            default:
                return redirect()->route('tus.inscripciones', $estudiante_id);
                //return redirect()->route([InscripcioneController::class, 'tusinscripciones'], ['estudiante_id' => $estudiante_id]);
                break;
        }
    }

}
