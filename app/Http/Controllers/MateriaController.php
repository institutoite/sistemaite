<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


use App\Http\Requests\MateriaStoreRequest;
use App\Http\Requests\MateriaUpdateRequest;


class MateriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Materias')->only('index','show');
        $this->middleware('can:Crear Materias')->only('create','store','GuardarConfigurarNiveles');
        $this->middleware('can:Editar Materias')->only('edit','update','configurar_niveles');
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
    public function store(MateriaStoreRequest $request)
    {
        //dd($request->all());
        $materia= new Materia();
        $materia->materia=$request->materia;
        $materia->save();
    
        $materia->usuarios()->attach(Auth::user()->id);

        foreach (array_keys($request->niveles) as $key) {
            $materia->niveles()->attach($key,['materia_id'=>$materia->id]);
        }
        return redirect()->route('materias.show',$materia);
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
        $user=$materia->usuarios->first();
        return view('materia.show',compact('niveles','materia','user'));
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return response()->json($materia);
        return response()->json(['mensaje'=>"Se elimino correctamente"]);
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
    public function update(MateriaUpdateRequest $request, Materia $materia)
    {
        $materia->materia=$request->materia;
        $materia->save();
        $materia->niveles()->sync(array_keys($request->niveles));
        return redirect()->route('materias.show',$materia);
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
