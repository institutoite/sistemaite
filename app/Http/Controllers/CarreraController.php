<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Docente;
use App\Models\Asignatura;
use App\Models\Requisito;
use Illuminate\Http\Request;

use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Requests\CarreraStoreRequest;
use App\Http\Requests\CarreraUpdateRequest;

class CarreraController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Carreras')->only('index','show');
        $this->middleware('can:Crear Carreras')->only('create','store');
        $this->middleware('can:Editar Carreras')->only('edit','update');
        $this->middleware('can:Eliminar Carreras')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::all();
        return view('carrera.index', compact('carreras'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docentes= Docente::all();
        return view('carrera.create',compact('docentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarreraStoreRequest $request)
    {
        
        $carrera = new Carrera();
        $carrera->carrera=$request->carrera;
        $carrera->description=$request->description;
        $carrera->precio=$request->precio;
        $carrera->save();
        return redirect()->route('carrera.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        $asignaturas = Asignatura::all()->where('carrera_id',$carrera->id);
        $requisitos = Requisito::all()->where('carrera_id',$carrera->id);
        return view('carrera.show',compact(['asignaturas','requisitos','carrera']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        return view('carrera.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(CarreraUpdateRequest $request, Carrera $carrera)
    {
        $carrera->carrera=$request->carrera;
        $carrera->description=$request->description;
        $carrera->precio=$request->precio;
        $carrera->save();
        return redirect()->route('carrera.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }

    public function listar(){
        return datatables()->of(Carrera::get())
        ->addColumn('btn', 'carrera.action')
        ->rawColumns(['btn','description'])
        ->toJson();
    }
}
