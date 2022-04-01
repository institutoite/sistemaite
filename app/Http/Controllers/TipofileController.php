<?php

namespace App\Http\Controllers;

use App\Models\Tipofile;
use Illuminate\Http\Request;

use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;


class TipofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tipofile.index');
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
     * @param  \App\Models\Tipofile  $tipofile
     * @return \Illuminate\Http\Response
     */
    public function show(Tipofile $tipofile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipofile  $tipofile
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipofile $tipofile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipofile  $tipofile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipofile $tipofile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipofile  $tipofile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipofile $tipofile)
    {
        //
    }
    public function listar(){
        return datatables()->of(Tipofile::get())
        ->addColumn('btn', 'tipofiles.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
