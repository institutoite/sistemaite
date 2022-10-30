<?php

namespace App\Http\Controllers;

use App\Models\Tipofile;
use Illuminate\Http\Request;

use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\TipofileGuardarRequest;
use App\Http\Requests\TipofileUpdateRequest;

class TipofileController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Tipoarchivos')->only("index","mostrar");
        $this->middleware('can:Crear Tipoarchivos')->only("create","store");
        $this->middleware('can:Editar Tipoarchivos')->only("editar","actualizar");
        $this->middleware('can:Eliminar Tipoarchivos')->only("destroy");
    }
    
    public function index()
    {
        return view('tipofile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipofile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipofileGuardarRequest $request)
    {
        $tipofile = new Tipofile();
        $tipofile->tipofile = $request->tipofile;
        $tipofile->programa = $request->programa;
        $tipofile->save();
        return redirect()->route('tipofile.index')
            ->with('success', 'Motivo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipofile  $tipofile
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Request $request)
    {
        $tipofile = Tipofile::findOrFail($request->id);
        $data=['tipofile'=>$tipofile];
        return response()->json($data);
    }
    
    public function editar(Request $request)
    {
        $tipofile = Tipofile::find($request->id);
        return response()->json($tipofile);
    }

    public function actualizar(TipofileUpdateRequest $request)
    {
        //return response()->json($request->all());
        $tipofile = Tipofile::findOrFail($request->id);
        $tipofile->tipofile = $request->tipofile;
        $tipofile->programa = $request->programa;
        $tipofile->save();
        return response()->json(['tipofile'=>$tipofile]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipofile  $tipofile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipofile $tipofile)
    {
        $tipofile->delete();
        return response()->json(['mensaje'=>"Se elimino correctamente"]);
    }
    public function listar(){
        return datatables()->of(Tipofile::get())
        ->addColumn('btn', 'tipofile.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
