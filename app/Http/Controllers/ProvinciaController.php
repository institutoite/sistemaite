<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\ProvinciaStoreRequest;
use App\Http\Requests\ProvinciaUpdateRequest;
/**
 * Class ProvinciaController
 * @package App\Http\Controllers
 */
class ProvinciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Provincias')->only("index","show");
        $this->middleware('can:Crear Provincias')->only("create","store");
        $this->middleware('can:Editar Provincias')->only("edit","update");
        $this->middleware('can:Eliminar Provincias')->only("destroy");
    }
    public function index()
    {
        $provincias = Provincia::paginate();
        return view('provincia.index', compact('provincias'));
    }
    
    public function create()
    {
        // $provincia = new Provincia();
        $departamentos = Departamento::get();
        $paises = Pais::get();
        return view('provincia.create', compact('departamentos','paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinciaStoreRequest $request)
    {
        $provincia = Provincia::create($request->all());
        $provincia->usuarios()->attach(Auth::user()->id);
        return redirect()->route('provincias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provincia = Provincia::select('provincias.id','provincia','departamento','nombrepais','provincias.created_at','provincias.updated_at')
            ->join('departamentos','provincias.departamento_id','=','departamentos.id')
            ->join('pais','departamentos.pais_id','=','pais.id')
            ->where('provincias.id','=',$id)->get()->first();
        $prov= Provincia::findOrFail($id);    
        $user=$prov->usuarios->first();
        //$departamento=Departamento::findOrFail($provincia->departamento_id);
        return view('provincia.show', compact('provincia','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provincia = Provincia::find($id);
        $departamentos=Departamento::get();
        $paises = Pais::get();
        return view('provincia.edit', compact('provincia','departamentos','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Provincia $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinciaUpdateRequest $request, Provincia $provincia)
    {
        $provincia->update($request->all());
        return redirect()->route('provincias.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Provincia $provincia)
    {
        $provincia->delete();
        return response()->json(['mensaje' => 'Registro Eliminado correctamente']);
    }
    public function provincia_of_departamento($id)
    {
        $provincias=Provincia::where('departamento_id', $id)->get();
        return response()->json($provincias);
    } 
     public function misProvincias(Provincia $provincia){
    // public function misMunicipios(){
        //$provincia= Provincia::findOrFail(1);
        $municipios=$provincia->municipios;
        return response()->json($municipios);
    }
    
}
