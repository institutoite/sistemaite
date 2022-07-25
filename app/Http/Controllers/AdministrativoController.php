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
use Illuminate\Support\Facades\DB;
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
            ->where('vigente',1)
            ->where('userables.userable_type',Inscripcione::class)
            ->select('inscripciones.id','personas.nombre','modalidads.modalidad','inscripciones.costo','fecha_proximo_pago')
            ->get();
        
            return datatables()->of($inscripciones)
                ->addColumn('btn', 'cartera.actioninscripciones')
                ->rawColumns(['btn'])
                ->toJson();
    }
    public function miCarteraInscripcionesDesvigentes(){
        $userActual = Auth::user();
        
        $inscripciones= Inscripcione::join('userables','userables.userable_id','inscripciones.id')
        ->join('estudiantes','inscripciones.estudiante_id','estudiantes.id')
        ->join('personas','personas.id','estudiantes.persona_id')
        ->join('users','users.id','userables.user_id')
        ->where('users.id', $userActual->id)
        ->where('vigente',0)
        ->where('userables.userable_type',Inscripcione::class)
        ->select('inscripciones.id','personas.nombre','personas.apellidop','apellidom',DB::raw("(SELECT max(fechafin) FROM inscripciones WHERE estudiantes.id= inscripciones.estudiante_id) as fecha"))
        ->groupBy('inscripciones.id','personas.nombre','personas.apellidop','apellidom','fecha')
        ->get();
        return datatables()->of($inscripciones)
                ->addColumn('btn', 'cartera.actioninscripcionesdesvigentes')
                ->rawColumns(['btn'])
                ->toJson();
        
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

            return datatables()->of($inscripciones)
                ->addColumn('btn', 'cartera.actioninscripcionesdesvigentes')
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
        ->where('vigente',1)
        ->where('userables.userable_type',Matriculacion::class)
        ->select('matriculacions.id','personas.nombre','asignaturas.asignatura','matriculacions.costo','fecha_proximo_pago')
        ->get();
    
        return datatables()->of($matriculaciones)
                ->addColumn('btn', 'cartera.actionmatriculacion')
                ->rawColumns(['btn'])
                ->toJson();
    }
    public function miCarteraMatriculacionesDesvigentes(){
        $userActual = Auth::user();
       $iculaciones=Matriculacion::join('computacions','matriculacions.computacion_id','computacions.id')
        ->join('userables','userables.userable_id','matriculacions.id')
        ->join('users','users.id','userables.user_id')
        ->join('personas','personas.id','computacions.persona_id')
        ->where('vigente',0)
        ->where('users.id', $userActual->id)
        ->select('personas.id','nombre','apellidop','apellidom',DB::raw("(SELECT max(fechafin) FROM matriculacions WHERE computacions.id= matriculacions.computacion_id) as fecha"))
        ->groupBy('personas.id','nombre','apellidop','apellidom','fecha')->get();
    
        return datatables()->of($matriculaciones)
                ->addColumn('btn', 'cartera.actionmatriculacion')
                ->rawColumns(['btn'])
                ->toJson();
    }

}
