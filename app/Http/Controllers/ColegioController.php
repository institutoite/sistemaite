<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Nivel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\ColegioStoreRequest;
use App\Http\Requests\ColegioUpdateRequest;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


use Illuminate\Http\Request;

/**
 * Class ColegioController
 * @package App\Http\Controllers
 */
class ColegioController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:Listar Colegios')->only('index','show','todos');
        $this->middleware('can:Crear Colegios')->only('create','store');
        $this->middleware('can:Editar Colegios')->only('edit','update');
        $this->middleware('can:Eliminar Colegios')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colegios = Colegio::paginate();

        return view('colegio.index', compact('colegios'))
            ->with('i', (request()->input('page', 1) - 1) * $colegios->perPage());
    }
    public function todos()
    {
        $colegios=Colegio::all();
        return response()->json($colegios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$colegio = new Colegio();
        $departamentos = Departamento::get();
        $provincias = Provincia::get();
        $municipios = Municipio::where('provincia_id',1)->get();
        $niveles= Nivel::get();
        //$mu= Nivel::get();

        return view('colegio.create', compact('municipios', 'provincias', 'departamentos','niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColegioStoreRequest $request)
    {
        
        $colegio =new Colegio();
        $colegio->nombre= $request->nombre;
        $colegio->rue= $request->rue;
        $colegio->director=$request->director;
        $colegio->direccion=$request->direccion;
        $colegio->telefono=$request->telefono;
        $colegio->dependencia=$request->dependencia;
        $colegio->turno=$request->turno;
        $colegio->nivel=$request->nivel;

        $colegio->departamento=Departamento::findOrFail($request->departamento)->departamento;
        $colegio->provincia=Provincia::findOrFail($request->provincia)->provincia;
        $colegio->municipio=municipio::findOrFail($request->municipio)->municipio;
        
        $colegio->areageografica=$request->areageografica;
        $colegio->coordenadax=$request->coordenadax;
        $colegio->coordenaday=$request->coordenaday;
        $colegio->save();
     
        if ($request->hasFile('imagen')){
            $foto=$request->file('imagen');
            $nombreImagen='colegios/'.str_replace(' ','',$colegio->nombre).'.jpg';
            $imagen= Image::make($foto)->encode('jpg',75);
            $imagen->resize(300,300,function($constraint){
                $constraint->upsize();
            });
            Storage::disk('public')->put($nombreImagen, $imagen->stream());
            $colegio->imagen = $nombreImagen;
        }
        $colegio->save();
        // $colegio->niveles()->sync(array_keys($request->niveles));
        $colegio->usuarios()->attach(Auth::user()->id);
       
        return redirect()->route('colegios.index')
            ->with('success', 'Colegio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colegio = Colegio::find($id);
        $user=$colegio->usuarios->first();
        return view('colegio.show', compact('colegio','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colegio = Colegio::find($id);
        $departamentos = Departamento::get();
        $provincias = Provincia::get();
        $municipios = Municipio::get();

        $departamento= Departamento::orWhere('departamento',$colegio->departamento)
        ->first();
        
        $provincia= Provincia::orWhere('provincia',$colegio->provincia)
        ->first();
        
        $municipio= Municipio::orWhere('municipio',$colegio->municipio)
        ->first();
        // dd($municipios);
        return view('colegio.edit', compact('colegio','departamentos','provincias','municipios','departamento','provincia','municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Colegio $colegio
     * @return \Illuminate\Http\Response
     */
    public function update(ColegioUpdateRequest $request, Colegio $colegio)
    {
        $colegio->update($request->all());
        if ($request->hasFile('foto')) {
            if (Storage::disk('public')->exists($persona->foto)) {
                Storage::disk('public')->delete($persona->foto);
            }
            $foto = $request->file('foto');
            $nombreImagen = 'estudiantes/' . Str::random(20) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());
            $persona->foto = $nombreImagen;
        }
        // $colegio->niveles()->sync(array_keys($request->niveles));
        return redirect()->route('colegios.index')
            ->with('success', 'Colegio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $colegio = Colegio::findOrFail($id);
        $colegio->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
    
}
