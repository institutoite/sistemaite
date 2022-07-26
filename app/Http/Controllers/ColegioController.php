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

use Illuminate\Http\Request;

/**
 * Class ColegioController
 * @package App\Http\Controllers
 */
class ColegioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Colegios')->only('index');
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
        $colegio = Colegio::create($request->all());
        $colegio->niveles()->sync(array_keys($request->niveles));
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
        $departamento=Departamento::findOrFail($colegio->departamento_id);
        $provincia = provincia::findOrFail($colegio->provincia_id);
        $municipio = municipio::findOrFail($colegio->municipio_id);
        $user=$colegio->usuarios->first();
        $niveles=$colegio->niveles;
        return view('colegio.show', compact('colegio','departamento','provincia','municipio','niveles','user'));
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
        $municipios = Municipio::where('provincia_id','=',$colegio->provincia_id)->get();


        $niveles_currents=$colegio->niveles; 
        $ids=[];
        foreach ($niveles_currents as $nivel) {
            $ids[] = $nivel->id;
        }
        $niveles_faltantes = Nivel::whereNotIn('id', $ids)->get();

        return view('colegio.edit', compact('colegio','departamentos','provincias','municipios','niveles_currents','niveles_faltantes'));
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
        $colegio->niveles()->sync(array_keys($request->niveles));
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
