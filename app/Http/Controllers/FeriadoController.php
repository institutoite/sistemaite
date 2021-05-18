<?php

namespace App\Http\Controllers;

use App\Models\Feriado;
use Illuminate\Http\Request;

/**
 * Class FeriadoController
 * @package App\Http\Controllers
 */
class FeriadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feriados = Feriado::paginate();

        return view('feriado.index', compact('feriados'))
            ->with('i', (request()->input('page', 1) - 1) * $feriados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feriado = new Feriado();
        return view('feriado.create', compact('feriado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Feriado::$rules);

        $feriado = Feriado::create($request->all());

        return redirect()->route('feriados.index')
            ->with('success', 'Feriado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feriado = Feriado::find($id);

        return view('feriado.show', compact('feriado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feriado = Feriado::find($id);

        return view('feriado.edit', compact('feriado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Feriado $feriado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feriado $feriado)
    {
        request()->validate(Feriado::$rules);

        $feriado->update($request->all());

        return redirect()->route('feriados.index')
            ->with('success', 'Feriado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $feriado = Feriado::find($id)->delete();

        return redirect()->route('feriados.index')
            ->with('success', 'Feriado deleted successfully');
    }
}
