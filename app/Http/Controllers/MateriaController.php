<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias=Materia::all();
        return view('materia.index',compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $materia= new Materia();
        $materia->materia=$request->materia;
        $materia->save();
    
        foreach (array_keys($request->niveles) as $key) {
            $materia->niveles()->attach($key,['materia_id'=>$materia->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        //
    }

    public function configurar_niveles($materia)
    {
        $Materia = Materia::findOrFail($materia);
        $idsNivelesMateria = Arr::pluck($Materia->niveles, 'id');
        $nivelesTodos = Arr::pluck(Nivel::select('id')->get(), 'id');
        $nivelesFaltantes = collect($nivelesTodos)->diff($idsNivelesMateria);
        $nivelesFaltantes = Nivel::whereIn('id', $nivelesFaltantes)->get();
        $nivelesMateria = Nivel::whereIn('id', $idsNivelesMateria)->get();
        return view('materia.nivel', compact('nivelesMateria', 'nivelesFaltantes', 'Materia'));
    }

    public function GuardarConfigurarNiveles(Request $request, $mate)
    {
        $materia = Materia::findOrFail($mate);
        $materia->niveles()->sync(array_keys($request->niveles));
        return redirect()->route('materias.gestionar.niveles', $materia->id);
    } 

}
