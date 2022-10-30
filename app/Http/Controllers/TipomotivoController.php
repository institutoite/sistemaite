<?php

namespace App\Http\Controllers;

use App\Models\Tipomotivo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use App\Models\User;

use Illuminate\Validation\Rule;


use App\Http\Requests\TipomotivoGuardarRequest;



class TipomotivoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Listar Tipomotivos')->only("index","mostrar");
        $this->middleware('can:Crear Tipomotivos')->only("create","store");
        $this->middleware('can:Editar Tipomotivos')->only("editar","actualizar");
        $this->middleware('can:Eliminar Tipomotivos')->only("destroy");
    }

    public function index()
    {
        return view('tipomotivo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipomotivo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipomotivoGuardarRequest $request)
    {
        $tipomotivo = new Tipomotivo();
        $tipomotivo->tipomotivo = $request->tipomotivo;
        $tipomotivo->save();
        $tipomotivo->usuarios()->attach(Auth::user()->id);
        return redirect()->route('tipomotivo.index')
            ->with('success', 'Motivo created successfully.');
    }

    
    public function mostrar(Request $request)
    {
        $tipomotivo = Tipomotivo::findOrFail($request->id);
        $user = $tipomotivo->usuarios->first();

        $data=['tipomotivo'=>$tipomotivo,'user'=>$user];
        return response()->json($data);
    }

    
    public function editar(Request $request)
    {
        $tipomotivo = Tipomotivo::find($request->id);
        return response()->json($tipomotivo);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipomotivo  $tipomotivo
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {

        $tipomotivo = Tipomotivo::findOrFail($request->id);
        $validator = Validator::make($request->all(), [
            'tipomotivo' => ['required','min:5','max:50',Rule::unique('tipomotivos', 'tipomotivo')->ignore($tipomotivo)],
        ]);
        if ($validator->passes()) {
            $tipomotivo = Tipomotivo::findOrFail($request->id);
            $tipomotivo->tipomotivo = $request->tipomotivo;
            $tipomotivo->save();
            return response()->json(['tipomotivo'=>$tipomotivo]);
        }else{
            return response()->json(['error' => $validator->errors()->first()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipomotivo  $tipomotivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipomotivo $tipomotivo)
    {
        $tipomotivo->delete();
        return response()->json(['mensaje'=>"Se elimino correctamente"]);
    }

    public function listar(){
        
        return datatables()->of(Tipomotivo::get())
        ->addColumn('btn', 'tipomotivo.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
