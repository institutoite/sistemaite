<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Persona;
use App\Http\Requests\StoreMensajeRequest;
use App\Http\Requests\UpdateMensajeRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;


class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('whatsapp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('whatsapp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMensajeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMensajeRequest $request)
    {
        $mensaje=new Mensaje();
        $mensaje->nombre = $request->nombre;
        $mensaje->mensaje= $request->mensaje;
        $mensaje->vigente=1;
        $mensaje->save();
        $mensaje->usuarios()->attach(Auth::user()->id);
        return redirect()->route('mensaje.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje $mensaje)
    {
        //dd($mensaje);
        $user=$mensaje->usuarios->first();
        
        return view('whatsapp.show',compact('mensaje','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensaje $mensaje)
    {
        return view("whatsapp.edit",compact('mensaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMensajeRequest  $request
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMensajeRequest $request, Mensaje $mensaje)
    {
        $mensaje->nombre=$request->nombre;
        $mensaje->mensaje=$request->mensaje;
        $mensaje->save();
        
        //dd($mensaje);
        return redirect()->route("mensaje.show",$mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();
        return response()->json(['mensaje'=>"Se eliminó correctamente"]);
    }

    
    public function listar(){
        $mensajes=Mensaje::all();
        return datatables()->of($mensajes)
        ->addColumn('btn', 'whatsapp.action')
        ->rawColumns(['btn','mensaje'])
        ->toJson();
    }
    public function listarMensajes(Request $request){
        //return response()->json($request->all());
        $mensajes=Mensaje::all();
        return datatables()->of($mensajes)
        ->addColumn('telefono',$request->telefono)
        ->addColumn('btn', 'whatsapp.actionenvio')
        ->rawColumns(['btn','telefono'])
        ->toJson();
    }

    public function darbaja(Request $request)
    {
       // return response()->json(['id'=>$request->all()]);
        $mensaje=Mensaje::findOrFail($request->mensaje_id);
        $mensaje->vigente=0;
        $mensaje->save();
        return response()->json(['mensaje'=>"Se dió de BAJA el registro correctamente"]);
    }
   
    public function daralta(Request $request)
    {
        $mensaje=Mensaje::findOrFail($request->mensaje_id);
        $mensaje->vigente=1;
        $mensaje->save();
        return response()->json(['mensaje'=>"Se dió de ALTA el registro correctamente"]);
    }
    // public function getMensajeGenerico()
    public function getMensajeGenerico(Request $request)
    {
        //return response()->json($request->all());
        $mensaje_id=$request->mensaje_id;   
        $persona_id=$request->persona_id;   
        $mensaje=Mensaje::findOrFail($mensaje_id);
        $persona=Persona::findOrFail($persona_id);
        $data=['mensaje'=>$mensaje,'persona'=>$persona];
        return response()->json($data);
    }

    public function MensajeMasivo()
    {
        $EstudiantesCalificacionDesc=Persona::join('estudiantes','personas.id','estudiantes.persona_id')
        ->join('calificacions','personas.id','calificacions.persona_id')
        ->select('personas.id','personas.nombre','personas.apellidom','personas.apellidop','vuelvefecha','foto',
                DB::raw("(select AVG(calificacion) from calificacions where personas.id=calificacions.persona_id) as promedio"))
        ->groupBy('id','nombre','apellidom','apellidop','vuelvefecha','promedio','personas.foto')
        ->orderBy('promedio','desc')
        ->get();

        return DataTables::of($EstudiantesCalificacionDesc)
        ->addColumn('btn','mensaje.masivo.actionmasivo')
        ->rawColumns(['btn'])
        ->toJson(); 
    }

    public function masivoView()
    {
        return view('mensaje.masivo.index');
    }
}
