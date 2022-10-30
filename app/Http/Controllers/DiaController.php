<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dia;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;


use App\Http\Requests\DiaStoreRequest;
use App\Http\Requests\DiaUpdateRequest;

class DiaController extends Controller
{
   public function __construct()
    {
        $this->middleware('can:Listar Dias')->only('index','show');
        $this->middleware('can:Crear Dias')->only('create','store');
        $this->middleware('can:Editar Dias')->only('edit','update');
        $this->middleware('can:Eliminar Dias')->only('destroy');
    }

    public function index()
    {
        return view('dia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiaStoreRequest $request)
    {
        $dia = new Dia();
        $dia->dia=$request->dia;
        $dia->save();
        return redirect()->route('dias.index');
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
        //dd($id);
        $dia=Dia::findOrFail($id);
        return view('dia.edit',compact('dia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiaUpdateRequest $request, $id)
    {
        $dia=Dia::findOrFail($id);
        $dia->dia=$request->dia;
        $dia->save();
        return redirect()->route('dias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dia $dia)
    {
        $dia->delete();
        return response()->json(['mensaje' => 'Registro Eliminado correctamente']);
    }
     public function listar(){
        return datatables()->of(Dia::get())
        ->addColumn('btn', 'dia.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
