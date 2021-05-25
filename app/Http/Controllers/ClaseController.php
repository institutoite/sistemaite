<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

/**
 * Class ClaseController
 * @package App\Http\Controllers
 */
class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = Clase::paginate();

        return view('clase.index', compact('clases'))
            ->with('i', (request()->input('page', 1) - 1) * $clases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clase = new Clase();
        return view('clase.create', compact('clase'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Clase::$rules);

        $clase = Clase::create($request->all());

        return redirect()->route('clases.index')
            ->with('success', 'Clase created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clase = Clase::find($id);

        return view('clase.show', compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clase = Clase::find($id);

        return view('clase.edit', compact('clase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Clase $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clase $clase)
    {
        request()->validate(Clase::$rules);

        $clase->update($request->all());

        return redirect()->route('clases.index')
            ->with('success', 'Clase updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $clase = Clase::find($id)->delete();

        return redirect()->route('clases.index')
            ->with('success', 'Clase deleted successfully');
    }
}
