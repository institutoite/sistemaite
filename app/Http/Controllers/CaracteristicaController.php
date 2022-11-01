<?php

namespace App\Http\Controllers;

use App\Models\Caracteristica;
use App\Models\Plan;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCaracteristicaRequest;

use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Contracts\DataTable as DataTable;


class CaracteristicaController extends Controller
{

    public function __construct(){
        $this->middleware('can:Listar Caracteristica')->only('index','show');
        $this->middleware('can:Crear Caracteristica')->only('create','store');
        $this->middleware('can:Editar Caracteristica')->only('edit','update');
        $this->middleware('can:Eliminar Caracteristica')->only('destroy');
    }

    public function index()
    {
        return view('caracteristica.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planes=Plan::all();
        return view('caracteristica.create',compact('planes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCaracteristicaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCaracteristicaRequest $request)
    {
        $caracteristica= new Caracteristica();
        $caracteristica->caracteristica=$request->caracteristica;
        $caracteristica->plan_id=$request->plan_id;
        $caracteristica->save();
        $caracteristica->usuarios()->attach(Auth::user()->id);
        return redirect()->route('caracteristica.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caracteristica  $caracteristica
     * @return \Illuminate\Http\Response
     */
    public function show(Caracteristica $caracteristica)
    {
        return view('caracteristica.show', compact('caracteristica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caracteristica  $caracteristica
     * @return \Illuminate\Http\Response
     */
    public function edit(Caracteristica $caracteristica)
    {
        $planes=Plan::all();
        return view('caracteristica.edit', compact('caracteristica','planes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCaracteristicaRequest  $request
     * @param  \App\Models\Caracteristica  $caracteristica
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCaracteristicaRequest $request, Caracteristica $caracteristica)
    {
        $caracteristica->caracteristica=$request->caracteristica;
        $caracteristica->plan_id=$request->plan_id;
        $caracteristica->save();
        return redirect()->route('caracteristica.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caracteristica  $caracteristica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caracteristica $caracteristica)
    {
        // $caracteristica=Caracteristica::findOrFail($request->id);
        $caracteristica->delete();
        return response()->json(['mensaje' => "eliminado correctamente"]);
    }
    public function listar(){
        $caracteristicas = Caracteristica::join('plans','caracteristicas.plan_id','plans.id')
            ->select('caracteristicas.id','caracteristica','plans.titulo as plan')
            ->get();
        return datatables()->of($caracteristicas)
        ->addColumn('btn', 'caracteristica.action')
        ->rawColumns(['btn','caracteristica'])
        ->toJson();
    }
}
