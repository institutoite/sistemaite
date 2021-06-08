<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= Hash::make($request->password);

        //dd($request->foto[0]);
        $user->foto=$request->foto[0]->store('usuarios','public');
        $user->save();
        //return redirect()->back()->with('mensaje','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        return view('user.mostrar',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view("user.editar", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        
        /*$pais=User::findOrFail($id);
        $pais->nombrepais=$request->nombrepais;
        $pais->save();
        $Mensaje="Se actualizó correctamente el registro, Reviselo";

        return view('pais.mostrar',compact('pais','Mensaje'));*/
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pais = Pais::findOrFail($id);
        // $pais->delete();
        // return redirect()->back()->with('mensaje','Registro eliminado Correctamente');
    }
    public function eliminarPais($id) {
        // $pais = Pais::findOrFail($id);
        // $pais->delete();
        // return response()->json(['message' => 'Registro Eliminado','status'=>200]); 
    }
}
