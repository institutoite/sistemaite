<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\InterestGuardarRequest;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('interest.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterestGuardarRequest $request)
    {
        $interest = new interest();
        $interest->interest = $request->interest;
        $interest->save();
        return redirect()->route('interest.index')
            ->with('success', 'Motivo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function show(Interest $interest)
    {
        //
    }
    public function mostrar(Request $request)
    {
        $interest = Interest::findOrFail($request->id);
        $data=['interest'=>$interest];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipomotivo $tipomotivo)
    {
        //
    }

    public function editar(Request $request)
    {
        $interest = Interest::find($request->id);
        return response()->json($interest);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
     public function actualizar(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'interest' => 'required|min:5|max:30|unique:interests',
        ]);

        if ($validator->passes()) {
            $interest = Interest::findOrFail($request->id);
            $interest->interest = $request->interest;
            $interest->save();
            return response()->json(['interest'=>$interest]);
        }else{
            return response()->json(['error' => $validator->errors()->first()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Interest::find($id)->delete();
        return response()->json(['mensaje'=>"Se elimino correctamente"]);
    }

    public function listar(){
        return datatables()->of(Interest::get())
        ->addColumn('btn', 'interest.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}