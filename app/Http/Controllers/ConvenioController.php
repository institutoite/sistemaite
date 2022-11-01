<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use App\Http\Requests\StoreConvenioRequest;
use App\Http\Requests\UpdateConvenioRequest;
use App\Http\Requests\DeleteRequest;
use Yajra\DataTables\Contracts\DataTable as DataTable;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;


class ConvenioController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Crear Convenios')->only('create','store');
        $this->middleware('can:Editar Convenios')->only('edit','update');
        $this->middleware('can:Eliminar Convenios')->only('destroy');
    }
    
    public function index()
    {
        return view('convenio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('convenio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConvenioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConvenioRequest $request)
    {
        $convenio= new Convenio();
        $convenio->titulo=$request->titulo;
        $convenio->descripcion=$request->descripcion;
        if ($request->hasFile('foto')){
            $foto=$request->file('foto');
            $nombreImagen='convenios/'.str_replace(' ','',$request->titulo).'.jpg';
            $imagen= Image::make($foto)->encode('jpg',90);
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());
            $convenio->foto = $nombreImagen;
        }
        $convenio->save();
        $convenio->usuarios()->attach(Auth::user()->id);
        return redirect()->route('convenio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function show(Convenio $convenio)
    {
        return view('convenio.show',compact('convenio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio)
    {
        return view('convenio.edit', compact('convenio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConvenioRequest  $request
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConvenioRequest $request, Convenio $convenio)
    {

        $convenio->titulo=$request->titulo;
        $convenio->descripcion=$request->descripcion;
        
        if ($request->hasFile('foto')){
            if (Storage::disk('public')->exists($convenio->foto)) {
                Storage::disk('public')->delete($convenio->foto);
            }
            $foto=$request->file('foto');
            $nombreImagen='convenios/'.str_replace(' ','',$request->titulo).'.jpg';
            $imagen= Image::make($foto)->encode('jpg',90);
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());
            $convenio->foto = $nombreImagen;
        }
        $convenio->save();
        return redirect()->route('convenio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    // public function destroy(DeleteRequest $request)
    public function destroy(Convenio $convenio)
    {
        $convenio->delete();
        return response()->json(['mensaje'=>"El registro fue eliminao correctamente"]);
    }
    public function listar(){
        $convenio=Convenio::all();
        return datatables()->of($convenio)
        ->addColumn('btn', 'convenio.action')
        ->rawColumns(['btn','descripcion'])
        ->toJson();
    }
}
