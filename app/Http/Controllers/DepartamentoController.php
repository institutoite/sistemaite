<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Requests\DepartamentoStoreRequest;
use App\Http\Requests\DepartamentoUpdateRequest;

/**
 * Class DepartamentoController
 * @package App\Http\Controllers
 */
class DepartamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Departamentos')->only('index','show');
        $this->middleware('can:Crear Departamentos')->only('create','store');
        $this->middleware('can:Editar Departamentos')->only('edit','update');
        $this->middleware('can:Eliminar Departamentos')->only('destroy');
    }

    public function index()
    {
        $departamentos = Departamento::paginate();
        return view('departamento.index', compact('departamentos'))
            ->with('i', (request()->input('page', 1) - 1) * $departamentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises=Pais::get();
        return view('departamento.create', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoStoreRequest $request)
    {
        $departamento=new Departamento();
        $departamento->departamento=$request->departamento;
        $departamento->pais_id = $request->pais_id;
        $departamento->save();
        $departamento->usuarios()->attach(Auth::user()->id);
        return redirect()->route('departamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Departamento::findOrFail($id);
        $user=$departamento->usuarios->first();
        return view('departamento.show', compact('departamento','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);
        $paises=Pais::get();
        return view('departamento.edit', compact('departamento','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoUpdateRequest $request, Departamento $departamento)
    {
        $departamento->update($request->all());
        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return response()->json(['mensaje' => 'Registro Eliminado correctamente']);
    }
    public function misProvincias(Departamento $departamento){
        // $departamento= Departamento::findOrFail($departamento);
        $provinacias=$departamento->provincias;
        return response()->json($provinacias);
    }

}
