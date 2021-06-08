<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use Illuminate\Http\Request;

/**
 * Class LicenciaController
 * @package App\Http\Controllers
 */
class LicenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licencias = Licencia::paginate();

        return view('licencia.index', compact('licencias'))
            ->with('i', (request()->input('page', 1) - 1) * $licencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $licencia = new Licencia();
        return view('licencia.create', compact('licencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Licencia::$rules);

        $licencia = Licencia::create($request->all());

        return redirect()->route('licencias.index')
            ->with('success', 'Licencia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $licencia = Licencia::find($id);

        return view('licencia.show', compact('licencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $licencia = Licencia::find($id);

        return view('licencia.edit', compact('licencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Licencia $licencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Licencia $licencia)
    {
        request()->validate(Licencia::$rules);

        $licencia->update($request->all());

        return redirect()->route('licencias.index')
            ->with('success', 'Licencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $licencia = Licencia::find($id)->delete();

        return redirect()->route('licencias.index')
            ->with('success', 'Licencia deleted successfully');
    }
}
