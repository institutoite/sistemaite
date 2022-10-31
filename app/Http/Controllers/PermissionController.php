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
        $this->middleware('can:Crear Permisos')->only('create');
        $this->middleware('can:Editar Permisos')->only('edit','update');
    }
    public function index()
    {
        return view("permiso.index");
    }
    public function create()
    {
        return view("permiso.create");
    }
    public function edit(Permission $permission)
    {
        return view("permiso.edit",compact("permission"));
    }
    public function update(UpdatePermissionRequest $request,Permission $permission)
    {
        $permission->name = $request->name;
        $permission->save();
        return redirect()->route('permisos.index');   
    }
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->json(['mensaje'=>"El registro fue elimiando correctamente"]);
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
