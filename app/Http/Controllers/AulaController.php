<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Requests\AulaGuardarRequest;
use App\Http\Requests\AulaActualizarRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class AulaController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:Listar Aulas')->only('index','mostrar','listar');
        $this->middleware('can:Crear Aulas')->only('create','store');
        $this->middleware('can:Editar Aulas')->only('actualizar','editar');
        $this->middleware('can:Eliminar Aulas')->only('destroy');
    }

    public function index()
    {
        return view('aula.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AulaGuardarRequest $request)
    {
        $aula = new Aula();
        $aula->aula = $request->aula;
        $aula->direccion = $request->direccion;
        $aula->save();

        $aula->usuarios()->attach(Auth::user()->id);
        return redirect()->route('aulas.index')
            ->with('success', 'Registro creaado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipofile  $tipofile
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Request $request)
    {

        $aula = Aula::findOrFail($request->id);
        //$aula = Aula::findOrFail(16);
        $user=$aula->usuarios->first();
        $url=storage_path('app/public/'.$user->foto);
        $data=['aula'=>$aula,'user'=>$user,'url'=>$url];

        return response()->json($data);
    }
    
    public function editar(Request $request)
    {
        $aula = Aula::findOrFail($request->id);
        return response()->json($aula);
    }

    public function actualizar(Request $request)
    {
        $aula = Aula::findOrFail($request->id);
        $validator = Validator::make($request->all(), [
            'aula'=>'required',Rule::unique('aulas', 'aula')->ignore($aula),
            'direccion'=>'required',
        ]);
            if ($validator->passes()) {
            $aula = Aula::findOrFail($request->id);
            $aula->aula = $request->aula;
            $aula->direccion = $request->direccion;
            $aula->save();
            return response()->json(['aula'=>$aula]);
        }else{
            return response()->json(['error' => $validator->errors()->first()]);
        }
    }

    public function destroy($id)
    {
        Aula::findOrFail($id)->delete();
        return response()->json(['mensaje'=>"Se elimino correctamente"]);
    }
    public function listar(){
        return datatables()->of(Aula::get())
        ->addColumn('btn', 'aula.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
