<?php

namespace App\Http\Controllers;

use App\Models\Tipomotivo;
use Illuminate\Http\Request;

use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;

use App\Http\Requests\TipomotivoGuardarRequest;

use Illuminate\Support\Facades\Validator;

class TipomotivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('tipomotivo.index')
            ->with('success', 'Motivo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipomotivo  $tipomotivo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipomotivo $tipomotivo)
    {
        //
    }
    public function mostrar(Request $request)
    {
        $tipomotivo = Tipomotivo::findOrFail($request->id);
        //$user = User::findOrFail($tipomotivo->userable->user_id);

        $data=['tipomotivo'=>$tipomotivo];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipomotivo  $tipomotivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipomotivo $tipomotivo)
    {
        //
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

        // $request->tipomotivo ="Untipo";
        // $request->id =3;

        $validator = Validator::make($request->all(), [
            'tipomotivo' => 'required|min:5|max:50|unique:tipomotivos',
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
    public function destroy($id)
    {
        Tipomotivo::find($id)->delete();
        return response()->json(['mensaje'=>"Se elimino correctamente"]);
    }

    public function listar(){
        return datatables()->of(Tipomotivo::get())
        ->addColumn('btn', 'tipomotivo.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
