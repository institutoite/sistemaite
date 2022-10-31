<?php

namespace App\Http\Controllers;

use App\Models\Como;
use App\Http\Requests\StoreComoRequest;
use App\Http\Requests\DeleteComoRequest;
use App\Http\Requests\UpdateComoRequest;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;

class ComoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Comos')->only('index','show');
        $this->middleware('can:Crear Comos')->only('create','store');
        $this->middleware('can:Editar Comos')->only('edit','update');
        $this->middleware('can:Eliminar Comos')->only('destroy');
    }

    
    public function index()
    {
        return view('como.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("como.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComoRequest $request)
    {
        //dd($request->all());
        $como=new Como();
        $como->como=$request->como;
        $como->save();
        return redirect()->route('como.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Como  $como
     * @return \Illuminate\Http\Response
     */
    public function show(Como $como)
    {
        $user=$como->usuarios->first();
        return view('como.show', compact('como','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Como  $como
     * @return \Illuminate\Http\Response
     */
    public function edit(Como $como)
    {
        return view('como.edit', compact('como'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComoRequest  $request
     * @param  \App\Models\Como  $como
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComoRequest $request, Como $como)
    {
        $como->como=$request->como;
        $como->save();
        return redirect()->route('como.index');
    }

    public function destroy(Como $como)
    {
        $como->delete();
        return response()->json(['mensaje'=>"El registro fue eliminado correctamente"]);
    }
    public function listar(){
        $comos=Como::all();
        return datatables()->of($comos)
        ->addColumn('btn', 'como.action')
        ->rawColumns(['btn'])
        ->toJson();
    }

}
