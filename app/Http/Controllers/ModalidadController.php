<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use App\Models\Nivel;

use Illuminate\Http\Request;

/**
 * Class ModalidadController
 * @package App\Http\Controllers
 */
class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidads = Modalidad::paginate();

        return view('modalidad.index', compact('modalidads'))
            ->with('i', (request()->input('page', 1) - 1) * $modalidads->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalidad = new Modalidad();
        $niveles=Nivel::get();
        return view('modalidad.create', compact('modalidad','niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Modalidad::$rules);

        $modalidad = Modalidad::create($request->all());

        return redirect()->route('modalidads.index')
            ->with('success', 'Modalidad created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modalidad = Modalidad::find($id);
        $nivel=Nivel::findOrFail($modalidad->nivel_id);
        return view('modalidad.show', compact('modalidad','nivel'));
    }

    public function consultar(Request $request)
    {   
        
        if($request->ajax()){
            $modalidad = Modalidad::findOrFail($request->modalidad_id);
            return response()->json($modalidad, 200);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modalidad = Modalidad::find($id);
        $niveles = Nivel::get();
        return view('modalidad.edit', compact('modalidad','niveles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Modalidad $modalidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modalidad $modalidad)
    {
        request()->validate(Modalidad::$rules);

        $modalidad->update($request->all());

        return redirect()->route('modalidads.index')
            ->with('success', 'Modalidad updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $modalidad = Modalidad::findOrFail($id);
        $modalidad->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
}
