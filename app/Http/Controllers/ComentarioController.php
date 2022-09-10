<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Como;
use App\Models\Persona;
use App\Models\Ciudad;
use App\Models\Pais;
use App\Models\Zona;
use App\Models\Interest;
use App\Http\Requests\StoreComentarioRequest;
use App\Http\Requests\UpdateComentarioRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('comentario.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comos=Como::get();
        $interests=Interest::get();
        return view("comentario.create",compact('comos','interests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComentarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% Guarda desde la web %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
    public function guardarComentario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|min:4|max:30',
            'telefono'=>'required|min:8|max:10',
            'interests'=>'required',
            'comentario'=>'required|max:499|min:5',
            'como_id'=>'required',
        ]);
         if ($validator->passes()) {
            $comentario = new Comentario();
            $comentario->nombre = $request->nombre;
            $comentario->telefono = $request->telefono;
            $comentario->vigente = 1;
            $comentario->como_id = $request->como_id;
            $comentario->comentario = $request->comentario;
            $comentario->save();
            $comentario->interests()->sync(array_values($request->interests));
            $vectorIntereses=$comentario->interests;
            return response()->json(['comentario' => $comentario,'vector_intereses'=>$vectorIntereses]);
        }else{
            return response()->json(['error' => $validator->errors()]);
        }
    }    
    /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% Guarda desde sistema %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
    public function guardarComentarioDesdeSistema(StoreComentarioRequest $request)
    {
            $comentario = new Comentario();
            $comentario->nombre = $request->nombre;
            $comentario->telefono = $request->telefono;
            $comentario->vigente = 1;
            $comentario->como_id = $request->como_id;
            $comentario->comentario = $request->comentario;
            $comentario->save();
            $comentario->interests()->sync(array_values($request->interests));
            return redirect()->route('comentario.index');
    }

    public function estudiantizarComentario(Comentario $comentario){
        $persona=new Persona();
        $ciudades=Ciudad::get();
        $paises=Pais::get();
        $zonas=Zona::get();
        $interests=Interest::all();

        $comos=Como::all();
        
        $interests_currents=$comentario->interests; 
        $ids=[];
        foreach ($interests_currents as $interest) {
            $ids[] = $interest->id;
        }
        $interests_faltantes = Interest::whereNotIn('id', $ids)->get();

        //$interests_currents=
        return view('comentario.estudiantizarComentario',compact('ciudades','paises','zonas','interests','interests_currents','interests_faltantes','comos','comentario'));
    }
    
    public function crearContactoComentario($comentario_id){
        $comentario=Comentario::find($comentario_id);
        $nombre_archivo='comentarios/'.$comentario->id.'.vcf';
        Storage::append($nombre_archivo, 'BEGIN:VCARD');
        Storage::append($nombre_archivo, 'VERSION:3.0');
        
        Storage::append($nombre_archivo, 'N:;'.$comentario->id.";;".$comentario->nombre.";");
        Storage::append($nombre_archivo, 'FN:'.$comentario->nombre.' '.$comentario->id);
        
        $telefono = isset($comentario->telefono) ? $comentario->telefono : '0';
        Storage::append($nombre_archivo, "TEL;VALUE=uri;PREF=1;TYPE=voice,work:".$comentario->telefono);
        Storage::append($nombre_archivo, "URL:wa.me/591".$telefono);
        Storage::append($nombre_archivo, "LANG;TYPE=work;PREF=2:es");
        Storage::append($nombre_archivo, "NOTE:COMENTARIO:".$comentario->comentario);
        Storage::append($nombre_archivo, "NOTE:COMENTARIO:".$comentario->como->como);
        Storage::append($nombre_archivo, "NOTE:INTERESES:".$comentario->interests);
        Storage::append($nombre_archivo, "NOTE:FECHA REGISTRO:".$comentario->created_at->format('d-m-Y'));
        Storage::append($nombre_archivo, "NOTE:HORA REGISTRO:".$comentario->created_at->format('h:i:s'));
        Storage::append($nombre_archivo, 'END:VCARD');
        $contacto=Storage::disk('public')->put($nombre_archivo,'Contents');

        $url=storage_path("app\\comentarios\\".$comentario->id.".vcf");
        // if(!is_null($url)){
        //     if (file_exists($url)){
        //         if (unlink($url)) {
        //             $this->CrearContacto($comentario);
        //         }         
        //     }
        // }
       
        return response()->download($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        $interests=$comentario->interests;
        return view('comentario.show', compact('comentario','interests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        $comos=Como::get();
        return view('comentario.edit', compact('comentario','comos'));
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
        $comentario->nombre = $request->nombre;
        $comentario->telefono = $request->telefono;
        $comentario->comentario = $request->comentario;
        $comentario->interests = $request->interests;
        $comentario->como_id = $request->como_id;
        $comentario->save();

        return redirect()->route("comentario.show",$comentario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return response()->json(['mensaje'=>"Se eliminó correctamente"]);
    }
    
    public function listar(){
        $comentarios=Comentario::join('comos','comos.id','comentarios.como_id')
        ->select('comentarios.id','comentarios.nombre','comentarios.comentario','comos.como','telefono','vigente')
        ->get();
        return datatables()->of($comentarios)
        ->addColumn('btn', 'comentario.action')
        ->rawColumns(['btn','comentario'])
        ->toJson();
    }

    public function listarInterests($comentario_id){
        $interests=Comentario::findOrFail($comentario_id)->interests;
        return response()->json($interests);
    }
    public function darbaja(Request $request)
    {
        $comentario=Comentario::findOrFail($request->comentario_id);
        $comentario->vigente=0;
        $comentario->save();
        return response()->json(['mensaje'=>"Se dió de baja el registro correctamente"]);
    }
   
    public function daralta(Request $request)
    {
        $comentario=Comentario::findOrFail($request->comentario_id);
        $comentario->vigente=1;
        $comentario->save();
        return response()->json(['mensaje'=>"Se dió de alta el registro correctamente"]);
    }
}
