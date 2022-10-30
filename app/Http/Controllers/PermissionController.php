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
    }
    public function index()
    {
        return view("permiso.index");
    }
    public function create()
    {
        return view("permiso.create");
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
