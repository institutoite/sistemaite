<?php

namespace App\Http\Controllers;

use App\Models\Mododocente;
use App\Http\Requests\StoreMododocenteRequest;
use App\Http\Requests\UpdateMododocenteRequest;
use App\Http\Requests\DeleteRequest;

class MododocenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Mododocentes')->only('index','show');
        $this->middleware('can:Crear Mododocentes')->only('create','store');
        $this->middleware('can:Editar Mododocentes')->only('edit','update');
        $this->middleware('can:Eliminar Mododocentes')->only('destroy');
    }
    
    public function index()
    {
        return view('mododocente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("mododocente.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMododocenteRequest $request)
    {
        //dd($request->all());
        $mododocente=new Mododocente();
        $mododocente->mododocente=$request->mododocente;
        $mododocente->save();
        return redirect()->route('mododocentes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Como  $como
     * @return \Illuminate\Http\Response
     */
    public function show(Mododocente $mododocente)
    {
        return view('mododocente.show', compact('mododocente'));
        // return "soy el show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Como  $como
     * @return \Illuminate\Http\Response
     */
    public function edit(Mododocente $mododocente)
    {
        return view('mododocente.edit', compact('mododocente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComoRequest  $request
     * @param  \App\Models\Como  $como
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMododocenteRequest $request, Mododocente $mododocente)
    {
        $mododocente->mododocente=$request->mododocente;
        $mododocente->save();
        return redirect()->route('mododocentes.index');
    }

    public function destroy(Mododocente $mododocente)
    {
        $mododocente->delete();
        return response()->json(['mensaje'=>"El registro fue eliminado correctamentex"]);
    }
    public function listar(){
        
        $mododocentes=Mododocente::all();
        return datatables()->of($mododocentes)
        ->addColumn('btn', 'mododocente.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
