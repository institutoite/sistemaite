<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computacion;
use App\Models\Sesioncom;
use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Nivel;
use App\Models\Aula;
use App\Models\Dia;
use App\Models\Matriculacion;
use App\Models\Programacioncom;
use App\Models\Estudiante;
use App\Models\Tipomotivo;
use Illuminate\Support\Arr;
use App\Http\Requests\MatriculacionStoreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MatriculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Computacion $computacion)
    {
        //
    }
    public function misCarreras(Computacion $computacion)
    {
        $carreras=$computacion->carreras;
        if($carreras->count()>1){
            return view('matriculacion.carreras',compact('computacion','carreras'));
        }else{
            if($carreras->count()==0){
                return redirect()->route('configuracion.gestionar.carreras',$computacion->persona->id);
            }else{
                
                $carrera=$computacion->carreras->first();
                $asignaturas=$carrera->asignaturas;
                $inscritas =$computacion->matriculaciones;
                $ids=Arr::pluck($inscritas, 'asignatura_id');

                $motivos = Tipomotivo::findOrFail(2)->motivos;
                $asignaturasFaltantes=$carrera->asignaturas->whereNotIn('id', $ids);
                return view('matriculacion.create',compact('computacion','asignaturasFaltantes','motivos'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Computacion $computacion,Carrera $carrera)
    {
        $asignaturas=$carrera->asignaturas;
        $inscritas =$computacion->matriculaciones;
        $ids=Arr::pluck($inscritas, 'asignatura_id');
        $motivos = Tipomotivo::findOrFail(2)->motivos;
        $asignaturasFaltantes=$carrera->asignaturas->whereNotIn('id', $ids);
        return view('matriculacion.create',compact('computacion','asignaturasFaltantes','motivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculacionStoreRequest $request)
    {
        //dd($request->all());
        $matriculacion = new Matriculacion();
        $matriculacion->computacion_id=$request->computacion_id;
        $matriculacion->asignatura_id=$request->asignatura_id;
        $matriculacion->fechaini=$request->fechaini;
        $matriculacion->fechafin=$request->fechaini;
        $matriculacion->fecha_proximo_pago=$request->fechaini;
        $matriculacion->costo=$request->costo;
        $matriculacion->totalhoras=$request->totalhoras;
        $matriculacion->vigente=1;
        $matriculacion->condonado=0;
        $matriculacion->motivo_id=$request->motivo_id;

        $matriculacion->save();

        $nivel=Nivel::findOrFail(6);
        $aulas = Aula::get();
        $docentes = $nivel->docentes;
        $dias = Dia::get();
        $computacion=$matriculacion->computacion;
        $matriculacion->userable()->create(['user_id'=>Auth::user()->id]);
        return view('matriculacion.configurar', compact('computacion','matriculacion', 'aulas', 'docentes','dias')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($matriculacion_id)
    {
        $matriculacion = Matriculacion::findOrFail($matriculacion_id);
         $programacioncom = Programacioncom::join('aulas', 'programacioncoms.aula_id', '=', 'aulas.id')
        ->join('docentes', 'programacioncoms.docente_id', '=', 'docentes.id')
        ->join('personas', 'personas.id', '=', 'docentes.persona_id')
        ->select('programacioncoms.id','programacioncoms.fecha', 'horaini', 'horafin', 'horas_por_clase', 'personas.nombre', 'aulas.aula', 'programacioncoms.habilitado', 'programacioncoms.matriculacion_id')
        ->orderBy('fecha', 'asc')
        ->where('matriculacion_id', '=', $matriculacion_id)->get();

        $user=User::findOrFail($matriculacion->userable->user_id);
        //  $user=User::findOrFail($file->userable->user_id);

        return view('matriculacion.show', compact('matriculacion','programacioncom','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matriculacion = Matriculacion::find($id);
        $persona=$matriculacion->computacion->persona;
        $carrera=$matriculacion->asignatura->carrera;
        $asignaturasFaltantes = $carrera->asignaturas;
          $motivos = Tipomotivo::findOrFail(2)->motivos;
        return view('matriculacion.edit', compact('matriculacion','persona', 'asignaturasFaltantes','motivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $matriculacion_id)
    {
        //dd($request->all());
        $matriculacion = Matriculacion::findOrFail($matriculacion_id);
        $matriculacion->fechaini=$request->fechaini;
        $matriculacion->fechafin=$request->fechaini;
        $matriculacion->fecha_proximo_pago=$request->fechaini;
        $matriculacion->costo=$request->costo;
        $matriculacion->totalhoras=$request->totalhoras;
        $matriculacion->vigente=1;
        $matriculacion->asignatura_id=$request->asignatura_id;
        $matriculacion->condonado=0;
        $matriculacion->motivo_id=$request->motivo_id;
        $matriculacion->save();
        $nivel=Nivel::findOrFail(6);
        $aulas = Aula::get();
        $docentes = $nivel->docentes;
        $dias = Dia::get();
        $computacion=$matriculacion->computacion;
        $programacioncoms=$matriculacion->programacionescom;
        $clasesConsumidas=count($programacioncoms->where('estado_id','<>',Config::get('constantes.ESTADO_INDEFINIDO')));
        $ultimaclasepasada=$programacioncoms->where('estado_id','<>',Config::get('constantes.ESTADO_INDEFINIDO'))->max();
        //$matriculacion->userable()->create(['user_id'=>Auth::user()->id]);
        //  dd($ultimaclasepasada);
        return view('matriculacion.configurarupdate', compact('ultimaclasepasada','computacion','matriculacion', 'aulas', 'docentes','dias','programacioncoms','clasesConsumidas'));
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
    public function guardarconfiguracion(Request $request, $matriculacion){
        //dd($matriculacion);
        
        $cuantas_sesiones=count($request->dias);
        $i=0;
        while($i<$cuantas_sesiones){
            $sesion=new Sesioncom();
            $sesion->horainicio=$request->horainicio[$i];
            $sesion->horafin=$request->horafin[$i];
            $sesion->dia_id=$request->dias[$i];
            $sesion->docente_id=$request->docentes[$i];
            $sesion->aula_id=$request->aulas[$i];
            $sesion->matriculacion_id=$matriculacion;
            $sesion->save();
            $i=$i+1;
        }
        //$pagos=$matriculacion->pagos();
        return redirect()->route('pagocom.crear',$matriculacion);
    }

      public function actualizarConfiguracion(Request $request, $matriculacion_id)
    {

        $cuantas_sesiones = count($request->dias);
        $fecha=$request->fecha;
        Sesioncom::where('matriculacion_id', '=', $matriculacion_id)->delete();
        
        $matriculacion = Matriculacion::findOrFail($matriculacion_id);
        if($fecha<=$matriculacion->fechaini){
            $matriculacion->fechaini=$fecha;
        }
        
        $i = 0;
        while ($i < $cuantas_sesiones) {
            $sesion = new Sesioncom();
            $sesion->horainicio = $request->horainicio[$i];
            $sesion->horafin = $request->horafin[$i];
            $sesion->dia_id = $request->dias[$i];
            $sesion->docente_id = $request->docentes[$i];
            $sesion->aula_id = $request->aulas[$i];
            $sesion->matriculacion_id = $matriculacion_id;
            $sesion->save();
            $i = $i + 1;
        }
        
        

        if ($request->radioconfig=='radiodesde'){
            return redirect()->route('regenerar.programacioncom', ['matriculacion'=>$matriculacion->id,'fecha'=>$fecha]);   
        }
        if ($request->radioconfig=='radiotodo'){
            return redirect()->route('regenerar.programacioncom', ['matriculacion'=>$matriculacion->id,'fecha'=>$fecha,'unModo'=>'todo']);   
        }
    }

    public function actualizar_fecha_proximo_pago($fecha,$matriculacion_id){
       
        $matriculacion=Matriculacion::findOrFail($matriculacion_id);
        $matriculacion->fecha_proximo_pago=$fecha;
        $matriculacion->save();
        return redirect()->route('imprimir.programacioncom',$matriculacion->id);
    }


    public function tusMatriculacionesVigentes(Request $request){
        $persona=Estudiante::findOrFail($request->estudiante_id)->persona;
        $computacion=$persona->computacion;
        if($computacion!==null){
            $matriculacionesVigentes=Matriculacion::join('pagos','pagos.pagable_id','=','matriculacions.id')
            ->join('asignaturas','asignaturas.id','=','matriculacions.asignatura_id')        
            ->where('computacion_id','=',$computacion->id)
            ->where('pagos.pagable_type','=',"App\Models\Matriculacion")
            ->where('vigente', 1)
            ->select('matriculacions.id','vigente','costo','asignatura',DB::raw('sum(pagos.monto) as acuenta'))
            ->groupBy('matriculacions.id', 'vigente', 'costo','asignatura')->get();
        }
        // if($computacion!==null){
        //     $matriculacionesSinPago=Matriculacion::join('asignaturas','asignaturas.id','=','matriculacions.asignatura_id')        
        //     ->where('computacion_id','=',$computacion->id)
        //     ->where('vigente', 1)
        //     ->select('matriculacions.id','vigente','costo','asignatura')
        //     ->groupBy('matriculacions.id', 'vigente', 'costo','asignatura')->get();
        // }
        return datatables()->of($matriculacionesVigentes)
                ->addColumn('btn', 'inscripcione.actiontusmatriculacion')
                ->rawColumns(['btn'])
                ->toJson();
    }

    public function imprimirProgramacom(){

    }

    public function vigentesAjax(){
        $matriculacionesVigentes=Matriculacion::join('computacions','computacions.id','matriculacions.computacion_id')
        ->join('personas','personas.id','computacions.persona_id')
        ->where('vigente',1)
        ->select('matriculacions.id','personas.nombre','personas.apellidop','personas.apellidom')->get();
        return datatables()->of($matriculacionesVigentes)
            ->toJson();
    }

}


