<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
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
        // return response()->json($request->all());
        //return response()->json(['e'=>2]);

        $validator = Validator::make($request->all(), [
            'nombre'=>'required|min:4|max:30',
            'telefono'=>'required|min:8|max:10',
            'interests'=>'required',
            'comentario'=>'required|max:499|min:5',
        ]);
         if ($validator->passes()) {
            $comentario = new Comentario();
            $comentario->nombre = $request->nombre;
            $comentario->telefono = $request->telefono;
                $intereses_limpio=substr($request->interests, 0, -1);
            $comentario->interests = $intereses_limpio;
            $comentario->vigente = 1;
            $comentario->comentario = $request->comentario;
            $comentario->save();
            $vectorIntereses  = explode(',',$comentario->interests);
            //return response()->json($comentario);
            return response()->json(['comentario' => $comentario,'vector_intereses'=>$vectorIntereses]);
        }else{
            return response()->json(['error' => $validator->errors()->first()]);
        }
        
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
        return view('comentario.show', compact('comentario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        return view('comentario.edit', compact('comentario'));
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
        $comentario->interests = $request->interests;
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
        $comentarios=Comentario::all();
        return datatables()->of($comentarios)
        ->addColumn('btn', 'comentario.action')
        ->rawColumns(['btn'])
        ->toJson();
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
