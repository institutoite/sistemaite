<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/**
 * Class NivelController
 * @package App\Http\Controllers
 */
class NivelController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Niveles')->only('index');
        $this->middleware('can:Crear Niveles')->only('create','store');
        $this->middleware('can:Editar Niveles')->only('edit','update');
        $this->middleware('can:Eliminar Niveles')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivels = Nivel::all();

        return view('nivel.index', compact('nivels'));
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
        $nivel->userable()->create(['user_id'=>Auth::user()->id]);
        return redirect()->route('nivels.index');
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
        $user=User::findOrFail($nivel->userable->user_id);
        return view('nivel.show', compact('nivel','user'));
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

        return redirect()->route('nivels.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        return response()->json(['id'=>$id]);
        $nivel = Nivel::findOrFail($id);
        $nivel->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
}
