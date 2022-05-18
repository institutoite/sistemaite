<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class MateriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Materias')->only('index');
        $this->middleware('can:Crear Materias')->only('create','store');
        $this->middleware('can:Editar Materias')->only('edit','update');
        $this->middleware('can:Eliminar Materias')->only('destroy');
    }
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
        $nivelesMissings=Nivel::get();
        return view('materia.create',compact('nivelesMissings'));
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
    
        $materia->userable()->create(['user_id'=>Auth::user()->id]);

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
        $niveles = $materia->niveles;
        $user=User::findOrFail($materia->userable->user_id);
        return view('materia.show',compact('niveles','materia','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        $nivelesCurrents = $materia->niveles;
        $ids=[];
        foreach ($nivelesCurrents as $nivel) {
            $ids[] = $nivel->id;
        }
        $nivelesMissings = Nivel::whereNotIn('id', $ids)->get();
        return view('materia.edit',compact('materia','nivelesCurrents','nivelesMissings'));
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
        //dd($request->all());
        $materia->materia=$request->materia;
        $materia->save();
        $materia->niveles()->sync(array_keys($request->niveles));
        return redirect()->route('materias.show',$materia);
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
    public function listar(){
        $materias=Materia::all();
        return datatables()->of($materias)
        ->addColumn('btn', 'materia.action')
        ->rawColumns(['btn'])
        ->toJson();
    }

}
