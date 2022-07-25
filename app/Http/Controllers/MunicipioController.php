<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Pais;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Requests\MunicipioUpdateRequest;
use App\Http\Requests\MunicipioStoreRequest;

/**
 * Class MunicipioController
 * @package App\Http\Controllers
 */
class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::paginate();

        return view('municipio.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $provincias = Provincia::get();
        $departamentos=Departamento::get();
        $paises = Pais::get();

        return view('municipio.create', compact('paises','departamentos','provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipioStoreRequest $request)
    {
        $municipio = Municipio::create($request->all());
        $municipio->usuario()->attacha(Auth::user()->id);
        return redirect()->route('municipios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipio = Municipio::findOrFail($id);
        $provincia = Provincia::findOrFail($municipio->provincia_id);
        $departamento = Departamento::findOrFail($provincia->departamento_id);
        $pais = Pais::findOrFail($departamento->pais_id);
        $user=User::findOrFail($municipio->userable->user_id);
        return view('municipio.show', compact('municipio','provincia','departamento','pais','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipio = Municipio::find($id);
        $provincias = Provincia::get();
        $departamentos=Departamento::get();
        $paises = Pais::get();
        return view('municipio.edit', compact('municipio','provincias','departamentos','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Municipio $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(MunicipioUpdateRequest $request, Municipio $municipio)
    {
        $municipio->update($request->all());
        return redirect()->route('municipios.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        //return response()->json(['id'=>$id]);
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
    public function municipio_of_provincia($id)
    {
        $municipios=Municipio::where('provincia_id', $id)->get();
        return response()->json($municipios);
    } 
}
