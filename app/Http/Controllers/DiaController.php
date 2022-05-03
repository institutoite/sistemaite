<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dia;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;


use App\Http\Requests\DiaGuardarRequest;
use App\Http\Requests\DiaUpdateRequest;

class DiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
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
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        $dia = Dia::findOrFail($id);
        $dia->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
     public function listar(){
         //return response()->json(['d'=>2]);
        return datatables()->of(Dia::get())
        ->addColumn('btn', 'dia.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
