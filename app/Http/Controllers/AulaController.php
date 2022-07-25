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
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $aula->usuario()->attach(Auth::user()->id);
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
        $user=$aula->usuario->first();
        $url=storage_path('app/public/'.$user->foto);
        $data=['aula'=>$aula,'user'=>$user,'url'=>$url];

        return response()->json($data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipofile  $tipofile
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipofile $tipofile)
    {
        //
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipofile  $tipofile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipofile $tipofile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipofile  $tipofile
     * @return \Illuminate\Http\Response
     */
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
