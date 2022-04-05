<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;
use App\Models\Tipofile;
use App\Http\Requests\FileGuardarRequest;
use Carbon\Carbon;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('file.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipofiles=Tipofile::all();
        return  view('file.create',compact('tipofiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileGuardarRequest $request)
    {
        $NombreOriginal=$request->file->getClientOriginalName();
        $Extension=$this->extension($NombreOriginal);
        $file=new File();
        $file->descripcion =$request->descripcion;
        $file->file ="documento".Carbon::now()->format('d-m-Y');
        $file->tipofile =$Extension;
        $file->save();
        return view('file.index');
    }
    public function extension($unNombreArchivo){
        $invertido=strrev($unNombreArchivo);
        $PosPunto=strpos($invertido,'.');
        return strrev(substr($invertido,0,$PosPunto));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listar(){
        $files=File::
                select('id','descripcion','tipofile','updated_at');
        return datatables()->of($files)
        ->addColumn('btn', 'file.action')
        ->rawColumns(['btn'])
        ->toJson();
    }

    
}
