<?php

namespace App\Http\Controllers;

use App\Inscripcione;
use App\Persona;

use Illuminate\Http\Request;

/**
 * Class InscripcioneController
 * @package App\Http\Controllers
 */
class InscripcioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripciones = Inscripcione::paginate();

        return view('inscripcione.index', compact('inscripciones'))
            ->with('i', (request()->input('page', 1) - 1) * $inscripciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inscripcione = new Inscripcione();
        return view('inscripcione.create', compact('inscripcione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inscripcione::$rules);

        $inscripcione = Inscripcione::create($request->all());

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripcione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscripcione = Inscripcione::find($id);

        return view('inscripcione.show', compact('inscripcione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscripcione = Inscripcione::find($id);

        return view('inscripcione.edit', compact('inscripcione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inscripcione $inscripcione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcione $inscripcione)
    {
        request()->validate(Inscripcione::$rules);

        $inscripcione->update($request->all());

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripcione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inscripcione = Inscripcione::find($id)->delete();

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripcione deleted successfully');
    }

    public function listar($id){
        $persona=Persona::findOrFail($id);
        return view('inscripcione.tusinscripciones',compact('persona'));
    }

    public function tusinscripciones($id){
        return datatables()->of(Inscripcione::where('estudiante_id','=',$id)->get()) ///
            ->addColumn('btn', 'inscripcione.action')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
