<?php

namespace App\Http\Controllers;

use App\Models\Observacion;
use Illuminate\Http\Request;

/**
 * Class ObservacionController
 * @package App\Http\Controllers
 */
class ObservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $observacions = Observacion::paginate();

        return view('observacion.index', compact('observacions'))
            ->with('i', (request()->input('page', 1) - 1) * $observacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $observacion = new Observacion();
        return view('observacion.create', compact('observacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Observacion::$rules);

        $observacion = Observacion::create($request->all());

        return redirect()->route('observacions.index')
            ->with('success', 'Observacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $observacion = Observacion::find($id);
        return view('observacion.show', compact('observacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        $observacion = Observacion::find($request->id);
        return response()->json($observacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Observacion $observacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $observacion=Observacion::findOrFail($request->observacion_id);
        $observacion->observacion=$request->observacion;
        $observacion->save();

        return response()->json($request->all());
        //request()->validate(Observacion::$rules);

        $observacion->update($request->all());

        return redirect()->route('observacions.index')
            ->with('success', 'Observacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $observacion = Observacion::findOrFail($id)->delete();
        return response()->json($observacion);
    }
}
