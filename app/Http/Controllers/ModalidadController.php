<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use App\Models\Nivel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Requests\ModalidadStoreRequest;
use App\Http\Requests\ModalidadUpdateRequest;

/**
 * Class ModalidadController
 * @package App\Http\Controllers
 */
class ModalidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Modalidades')->only('index','show','consultar');
        $this->middleware('can:Crear Modalidades')->only('create','store');
        $this->middleware('can:Editar Modalidades')->only('edit','update');
        $this->middleware('can:Eliminar Modalidades')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidads = Modalidad::paginate();
        
        return view('modalidad.index', compact('modalidads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalidad = new Modalidad();
        $niveles=Nivel::get();
        return view('modalidad.create', compact('modalidad','niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModalidadStoreRequest $request)
    {
        //request()->validate(Modalidad::$rules);
        $modalidad = Modalidad::create($request->all());
        $modalidad->usuarios()->attach(Auth::user()->id);
        return redirect()->route('modalidads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modalidad = Modalidad::find($id);
        $nivel=Nivel::findOrFail($modalidad->nivel_id);
        $user=$modalidad->usuarios->first();
        return view('modalidad.show', compact('modalidad','nivel','user'));
    }

    public function consultar(Request $request)
    {   
        
        if($request->ajax()){
            $modalidad = Modalidad::findOrFail($request->modalidad_id);
            return response()->json($modalidad, 200);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modalidad = Modalidad::find($id);
        $niveles = Nivel::get();
        return view('modalidad.edit', compact('modalidad','niveles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Modalidad $modalidad
     * @return \Illuminate\Http\Response
     */
    public function update(ModalidadUpdateRequest $request, Modalidad $modalidad)
    {
        $modalidad->update($request->all());
        return redirect()->route('modalidads.index')
            ->with('success', 'Modalidad updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Modalidad $modalidad)
    {
        $modalidad->delete();
        return response()->json(['mensaje' => 'Registro Eliminado correctamente', 'status' => 200]);
    }
    public function cambiarVigente(Modalidad $modalidad)
    {
        if($modalidad->vigente==1){
            $modalidad->vigente =0;
        }
        else{ 
            $modalidad->vigente=1;
        }
        $modalidad->save();

        return response()->json(['mensaje' => 'Registro actualizado correctamente', 'status' => 200]);
    }
}
