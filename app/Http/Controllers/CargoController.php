<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Http\Requests\DeleteRequest;

class CargoController extends Controller
{

    public function __construct(){
        $this->middleware('can:Listar Cargos')->only('index','show');
        $this->middleware('can:Crear Cargos')->only('create','store');
        $this->middleware('can:Editar Cargos')->only('edit','update');
        $this->middleware('can:Eliminar Cargos')->only('destroy');
    }

    public function index()
    {
        return view('cargo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cargo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCargoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCargoRequest $request)
    {
        $cargo=new Cargo();
        $cargo->cargo=$request->cargo;
        $cargo->save();
        return redirect()->route('cargo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        return view('cargo.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        return view('cargo.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCargoRequest  $request
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCargoRequest $request, Cargo $cargo)
    {
        $cargo->cargo=$request->cargo;
        $cargo->save();
        return redirect()->route('cargo.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        // $cargo_id=$request->id;
        // $cargo=Cargo::findOrFail($cargo_id);
        $cargo->delete();
        return response()->json(['mensaje'=>"El registro fue eliminado correctamente"]);
    }
    public function listar(){
        $cargos=Cargo::all();
        return datatables()->of($cargos)
        ->addColumn('btn', 'cargo.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
