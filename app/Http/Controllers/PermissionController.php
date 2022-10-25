<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:Listar Permisos')->only('index');
        $this->middleware('can:Crear Permisos')->only('create','store');
        $this->middleware('can:Editar Permisos')->only('edit','update');
        $this->middleware('can:Eliminar Permisos')->only('destroy');
    }

    public function index()
    {
        return view("permiso.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("permiso.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $admin= Role::findOrFail(1);
        $admin->givePermissionTo('edit articles12');
        //$permission = Permission::create(['name' => 'edit articles1'])->assignRole($admin);;
        //Permission::create(['name' => "Un nuevo permiso"])->assignRole($rolAdmin);
        //dd($rolAdmin);
        dd($permission);
        // $permiso= new Permission();
        // $permiso->name=$request->name;
        // $permiso->guard_name="web";
        // $permiso->save();
        //return redirect()->route("permisos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function listar()
    {
        $permisos=Permission::all();
        return datatables()->of($permisos)
        ->addColumn('btn','permiso.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
