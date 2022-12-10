<?php

namespace App\Http\Controllers;

use App\Models\Observacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/**
 * Class ObservacionController
 * @package App\Http\Controllers
 */
class ObservacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Observaciones')->only("index","show");
        $this->middleware('can:Crear Observaciones')->only("create","store","guardarObservacionGeneral","GuardarObservacion");
        $this->middleware('can:Editar Observaciones')->only("edit","update","darbaja","daralta");
        $this->middleware('can:Eliminar Observaciones')->only("destroy","eliminarGeneral");
    }
    
    public function index()
    {
        $observacions = Observacion::paginate();

        return view('observacion.index', compact('observacions'))
            ->with('i', (request()->input('page', 1) - 1) * $observacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($observable_id, $observable_type)
    { 
        return view('observacion.create',compact('observable_id','observable_type'));
    }

    public function store(Request $request)
    {
       
        $observacion=new Observacion();
        $observacion->observacion=$request->observacion;
        $observacion->activo=1;
        $observacion->observable_id = $request->observable_id;
        $observacion->observable_type ='App\\Models\\'.$request->observable_type;
        $observacion->save();
        $observacion ->usuarios()->attach(Auth::user()->id);
        return redirect()->action($request->observable_type."Controller@show",$request->observable_id);
    }
    public function guardarObservacionGeneral(Request $request){
        $validator = Validator::make($request->all(), [
            'observacion' => 'required|min:5|max:400',
        ]);
        if ($validator->passes()) {
            $observacion =new Observacion;
            $observacion->observacion = $request->observacion;
            $observacion->observable_id=$request->observable_id;
            $observacion->activo=1;
            $observacion->observable_type='App\\Models\\'.$request->observable_type;
            $observacion->save();
            $observacion->usuarios()->attach(Auth::user()->id);
            return response()->json(['mensaje'=>"Guardado correctamente"]);    
        }else{
            return response()->json(['errores' => $validator->errors()]);
        }

        
    }
    public function GuardarObservacion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'observacion' => 'required|min:5|max:400',
        ]);
        if ($validator->passes()) {
            $observacion =new Observacion;
            $observacion->observacion = $request->observacion;
            $observacion->observable_id=$request->observable_id;
            $observacion->activo=1;
            $observacion->observable_type=$request->observable_type;
            $observacion->save();
            $observacion->usuarios()->attach(Auth::user()->id);
            return response()->json(['observacion'=>$observacion]);
        }else{
            return response()->json(['error' => $validator->errors()->first()]);
        }

       
        //return response()->json($request->all());
        return response()->json(['mensaje'=>"Guardado correctamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $observacion = Observacion::find($id);
        return view('observacion.show', compact('observacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $observacion = Observacion::find($request->id);
        return response()->json($observacion);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Observacion $observacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'observacion' => 'required|min:5|max:400',
        ]);
        if ($validator->passes()) {
            $observacion=Observacion::findOrFail($request->observacion_id);
            $observacion->observacion=$request->observacion;
            $observacion->save();
            return response()->json(['mensaje'=>"Guardado correctamente"]);    
        }else{
            return response()->json(['errores' => $validator->errors()]);
        }
    }
    public function darbaja(Request $request)
    {
        $observacion=Observacion::findOrFail($request->observacion_id);
        $observacion->activo=0;
        $observacion->save();
        return response()->json($request->all());
    }
    public function daralta(Request $request)
    {
        $observacion=Observacion::findOrFail($request->observacion_id);
        $observacion->activo=1;
        $observacion->save();
        return response()->json($request->all());
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $observacion = Observacion::findOrFail($id)->delete();
        return response()->json(['mensaje' => "El registro fue eliminado correctamente"]);
    }
    public function eliminarGeneral(Request $request)
    {        
        //return response()->json($request->all());       
        $observacion = Observacion::findOrFail($request->observacion_id)->delete();
        return response()->json(['mensaje' => "El registro fue eliminado correctamente"]);
    }

    public function listar($observable_id,$observable_type){
        
        $observaciones=Observacion::join('userables','userables.userable_id','=','observacions.id')
        ->join('users','users.id','=','userables.user_id')
        ->where('userable_type','App\\Models\\Observacion')
        ->where('observable_id',$observable_id)
        ->where('observable_type','App\\Models\\'.$observable_type)
        ->select('observacions.id','observacion','activo','name','observacions.created_at','observacions.updated_at')
        ->orderBy('created_at','desc')
        ->get();
        
        return datatables()->of($observaciones)
        ->addColumn('btn', 'observacion.action')
        ->rawColumns(['btn','observacion'])
        ->toJson();
    }
    public function listarGeneral(Request $request){
        //return response()->json($request->all());
        $observation=Observacion::join('userables','userables.userable_id','=','observacions.id')
            ->join('users','users.id','=','userables.user_id')
            ->where('userable_type','App\\Models\\Observacion')
            // ->where('observacions.activo',1)
            ->where('observable_id',$request->observable_id)
            ->where('observable_type','App\\Models\\'.$request->observable_type)
            ->select('observacions.id','observacion','activo','name','observacions.created_at','observacions.updated_at')
            ->orderBy('created_at','desc')
            ->get();
        return response()->json($observation);
    }
}
