<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Listar Roles')->only('index');
        $this->middleware('can:Editar Roles')->only('edit','update','store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


    
    public function edit(User $roluser)
    {
        $roles= Role::all();
        return view('users.edit', compact('roluser', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $roluser)
    {
        $roluser->roles()->sync($request->roles);

        return redirect()->route('rolusers.index', $roluser);
    }

    public function store(Request $request){
        $permission = Permission::create(['name' => $request->name]);
        //dd($permission);
    }
    
}