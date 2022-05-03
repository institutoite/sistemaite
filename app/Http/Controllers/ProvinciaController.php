<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Provincia;
use Illuminate\Http\Request;

/**
 * Class ProvinciaController
 * @package App\Http\Controllers
 */
class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincias = Provincia::paginate();

        return view('provincia.index', compact('provincias'))
            ->with('i', (request()->input('page', 1) - 1) * $provincias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincia = new Provincia();
        $departamentos = Departamento::get();
        return view('provincia.create', compact('provincia','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Provincia::$rules);

        $provincia = Provincia::create($request->all());

        return redirect()->route('provincias.index')
            ->with('success', 'Provincia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provincia = Provincia::select('provincias.id','provincia','departamento')
            ->join('departamentos','provincias.departamento_id','=','departamentos.id')
            ->where('provincias.id','=',$id)->get()->first();
        //$departamento=Departamento::findOrFail($provincia->departamento_id);
        return view('provincia.show', compact('provincia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provincia = Provincia::find($id);
        $departamentos=Departamento::get();
        return view('provincia.edit', compact('provincia','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Provincia $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provincia $provincia)
    {
        request()->validate(Provincia::$rules);

        //dd($request->all());

        $provincia->update($request->all());

        
        return redirect()->route('provincias.index')
            ->with('success', 'Provincia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $provincia = Provincia::findOrFail($id);
        $provincia->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
    public function provincia_of_departamento($id)
    {
        $provincias=Provincia::where('departamento_id', $id)->get();
        return response()->json($provincias);
    } 

    
}
