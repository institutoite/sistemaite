<?php

namespace App\Http\Controllers;

use App\Models\Tipomotivo;
use Illuminate\Http\Request;

use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;

class TipomotivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tipomotivo.index');
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
     * @param  \App\Models\Tipomotivo  $tipomotivo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipomotivo $tipomotivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipomotivo  $tipomotivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipomotivo $tipomotivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipomotivo  $tipomotivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipomotivo $tipomotivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipomotivo  $tipomotivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipomotivo $tipomotivo)
    {
        //
    }

    public function listar(){
        return datatables()->of(Tipomotivo::all())
        ->addColumn('btn', 'tipomotivo.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
