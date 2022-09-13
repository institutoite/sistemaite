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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('como.show', compact('como'));
        // return "soy el show";
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

    // public function destroy()
    public function destroy(DeleteComoRequest $request)
    {
        // $como_id=4;
        $como_id=$request->id;
        $como=Como::findOrFail($como_id);
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
