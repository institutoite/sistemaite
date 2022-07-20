<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrativo;
use App\Models\Inscripcione;
use App\Models\Matriculacion;
use App\Models\User;


use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrativo.index');
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

    public function vistaCartera(){
        return view('cartera.index');
    }
    public function miCarteraInscripciones(){
        $userActual = Auth::user();
        $inscripciones= Inscripcione::join('userables','userables.userable_id','inscripciones.id')
            ->join('estudiantes','inscripciones.estudiante_id','estudiantes.id')
            ->join('modalidads','modalidads.id','inscripciones.modalidad_id')
            ->join('personas','personas.id','estudiantes.persona_id')
            ->join('users','users.id','userables.user_id')
            ->where('users.id', $userActual->id)
            ->where('userables.userable_type',Inscripcione::class)
            ->select('inscripciones.id','personas.nombre','modalidads.modalidad','inscripciones.costo','fecha_proximo_pago')
            ->get();
        
            return datatables()->of($inscripciones)
                ->addColumn('btn', 'cartera.actioninscripciones')
                ->rawColumns(['btn'])
                ->toJson();
    }
    public function miCarteraMatriculaciones(){
       $userActual = Auth::user();
        $matriculaciones=Matriculacion::join('userables','userables.userable_id','matriculacions.id')
        ->join('computacions','matriculacions.computacion_id','computacions.id')
        ->join('asignaturas','asignaturas.id','matriculacions.asignatura_id')
        ->join('personas','personas.id','computacions.persona_id')
        ->join('users','users.id','userables.user_id')
        ->where('users.id', $userActual->id)
        ->where('userables.userable_type',Matriculacion::class)
        ->select('matriculacions.id','personas.nombre','asignaturas.asignatura','matriculacions.costo','fecha_proximo_pago')
        ->get();
    
          return datatables()->of($matriculaciones)
                ->addColumn('btn', 'cartera.actionmatriculacion')
                ->rawColumns(['btn'])
                ->toJson();
    }

}
