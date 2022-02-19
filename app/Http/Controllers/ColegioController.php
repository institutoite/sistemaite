<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Provincia;

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
        $municipios = Municipio::get();
        return view('colegio.create', compact('municipios', 'provincias', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate(Colegio::$rules);
        //dd($request->all());
        $colegio = Colegio::create($request->all());
        //dd($colegio);
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
        // $colegio = Colegio::find($id);
        // $departamento=Departamento::findOrFail($colegio->departamento_id);
        // $provincia = provincia::findOrFail($colegio->provincia_id);
        // $municipio = municipio::findOrFail($colegio->municipio_id);

       // return view('colegio.show', compact('colegio','departamento','provincia','municipio'));
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
        $municipios = Municipio::where('provincia_id','=',$colegio->provincia)->get();
        return view('colegio.edit', compact('colegio','departamentos','provincias','municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Colegio $colegio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colegio $colegio)
    {
        request()->validate(Colegio::$rules);

        $colegio->update($request->all());
        //dd($colegio);
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
