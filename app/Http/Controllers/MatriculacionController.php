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
use Illuminate\Support\Arr;
use App\Http\Requests\MatriculacionStoreRequest;

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
            return view('matriculacion.carreras',compact('computacion'));
        }else{
            if($carreras->count()==0){
                return redirect()->route('configuracion.gestionar.carreras',$computacion->persona->id);
            }else{
                
                $carrera=$computacion->carreras->first();
                $asignaturas=$carrera->asignaturas;
                $inscritas =$computacion->matriculaciones;
                $ids=Arr::pluck($inscritas, 'asignatura_id');
                $asignaturasFaltantes=$carrera->asignaturas->whereNotIn('id', $ids);
                return view('matriculacion.create',compact('computacion','asignaturasFaltantes'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Computacion $computacion)
    {
        return view('matriculacion.create',compact('computacion'));
    }

    public function CarrerasComptacion($computacion){
        $carreras=Computacion::findOrFail($computacion)->carreras;
        //return response()->json(['o'=>$computacion]);
        return datatables()->of($carreras)
            ->addColumn('btn', 'matriculacion.action')
            ->rawColumns(['btn'])
            ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculacionStoreRequest $request)
    {
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
        $matriculacion->save();

        $nivel=Nivel::findOrFail(6);
        $aulas = Aula::get();
        $docentes = $nivel->docentes;
        $dias = Dia::get();
        $computacion=$matriculacion->computacion;
        return view('matriculacion.configurar', compact('computacion','matriculacion', 'aulas', 'docentes','dias')); 
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
}
