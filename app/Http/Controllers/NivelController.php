<?php

namespace App\Http\Controllers;

use App\Nivel;
use Illuminate\Http\Request;

/**
 * Class NivelController
 * @package App\Http\Controllers
 */
class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivels = Nivel::paginate();

        return view('nivel.index', compact('nivels'))
            ->with('i', (request()->input('page', 1) - 1) * $nivels->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nivel = new Nivel();
        return view('nivel.create', compact('nivel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Nivel::$rules);

        $nivel = Nivel::create($request->all());

        return redirect()->route('nivels.index')
            ->with('success', 'Nivel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivel = Nivel::find($id);

        return view('nivel.show', compact('nivel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nivel = Nivel::find($id);

        return view('nivel.edit', compact('nivel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Nivel $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nivel $nivel)
    {
        request()->validate(Nivel::$rules);

        $nivel->update($request->all());

        return redirect()->route('nivels.index')
            ->with('success', 'Nivel updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $nivel = Nivel::findOrFail($id);
        $nivel->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
}
