<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Http\Requests\StoreComentarioRequest;
use App\Http\Requests\UpdateComentarioRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComentarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarComentario(Request $request)
    {
        //return response()->json($request->all());

        $validator = Validator::make($request->all(), [
            'nombre'=>'required|min:5|max:30',
            'telefono'=>'required|min:8|max:10',
            'interests'=>'required',
        ]);
         if ($validator->passes()) {
            $comentario = new Comentario();
            $comentario->nombre = $request->nombre;
            $comentario->telefono = $request->telefono;
            $comentario->interests = $request->interests;
            $comentario->save();
            
            $cadena_intereses  = $comentario->interests;
            $vectorIntereses = explode(",", $cadena_intereses);
            array_pop($vectorIntereses);
            return response()->json(['comentario' => $comentario,'vector_intereses'=>$vectorIntereses]);
        }else{
            return response()->json(['error' => $validator->errors()->first()]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComentarioRequest  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComentarioRequest $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
