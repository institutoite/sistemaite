<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Materia;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\TemaUpdateRequest;
use App\Http\Requests\TemaStoreRequest;
use App\Http\Requests\DeleteRequest;

class TemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Temas')->only("index","show");
        $this->middleware('can:Crear Temas')->only("create","store");
        $this->middleware('can:Editar Temas')->only("edit","update");
        $this->middleware('can:Eliminar Temas')->only("destroy");
    }
    
    public function index()
    {
        return view('tema.index');
    }
    public function listar($materia_id)
    {
        $temas=Tema::where('materia_id',$materia_id)->get();
        
        return response()->json($temas);
    }

    public function Lista(){
        $temas=Tema::join('materias','materias.id','temas.materia_id')
                    ->select('temas.id','temas.tema','materias.materia')
                    ->get();
        return datatables()->of($temas)
            ->addColumn('btn', 'tema.action')
            ->rawColumns(['btn'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias=Materia::all();
        return view('tema.create', compact('materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemaStoreRequest $request)
    {
        $tema= new Tema();
        $tema->tema = $request->tema;
        $tema->materia_id=$request->materia_id;
        $tema->save();
        $tema->usuarios()->attach(Auth::user()->id);
        return view('tema.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        $user=$tema->usuarios->first();
        return view('tema.show', compact('tema','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        $materias=Materia::all();
        return view('tema.edit', compact('tema','materias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(TemaUpdateRequest $request, Tema $tema)
    {
        $tema->tema=$request->tema;
        $tema->materia_id=$request->materia_id;
        $tema->save();
        return redirect()->route('tema.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
        $tema->delete();
        return response()->json(['mensaje' => 'Registro Eliminado Correctamente', 'status' => 200]);
    }
    
    public function tema_of_materia($materia_id){  
        $temas=Tema::where('materia_id',$materia_id)->get();
        return response()->json($temas);       
    } 
}
