<?php

namespace App\Http\Controllers;

use App\Models\Telefono;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GuardarApoderadoExistenteRequest;
use App\Http\Requests\TelefonoUpdateRequest;

class TelefonoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Telefonos')->only("index","mostrarvista","mostrarvistaConIdPersona","apoderadoExistente");
        $this->middleware('can:Crear Telefonos')->only("crear","agregarApoderado");
        $this->middleware('can:Editar Telefonos')->only("editar","actualizar");
        $this->middleware('can:Eliminar Telefonos')->only("eliminarTelefono");
    }
    
    public function index(Persona $persona)
    {
        if (request()->ajax()) {
            $datos =datatables()->of(Telefono::select('id', 'numero', 'parentesco')->where('persona_id', '=', $persona->id))
            ->addColumn('btn', 'user.action')
            ->rawColumns(['btn', 'icono'])
            ->toJson();    
            return $datos;
        }
    }

    public function telefonoPersona(Persona $persona){
        
       return Telefono::select('id', 'numero', 'parentesco')->where('persona_id', '=', $persona->id);
    }
    

    public function mostrarvista(Persona $persona){
        $apoderados= $persona->apoderados;
        return view('telefono.index',compact('persona','apoderados'));
    }
   
    public function mostrarvistaConIdPersona($persona_id){
        //return response()->json(['d'=>$persona_id]);
        $persona=Persona::find($persona_id);
        $apoderados=$persona->apoderados;

        return view('telefono.index',compact('persona','apoderados'));
    }

   
    public function crear(Persona $persona)
    {
        return view('telefono.crear',compact('persona'));
    }

   

    public function apoderadoExistente(Persona $persona){
        
        return view('persona.existente',compact('persona'));
        // return view('persona.existente');
    }
    public function listarApoderados(Persona $persona){
        $apoderados=Persona::all();
        return datatables()->eloquent($apoderados)
        ->addColumn('btn','persona.apoderadoaction')
        ->rawColumns(['btn'])
        ->toJson();
    }
    public function prueba($persona,$apoderado){
        return $persona.$apoderado;
    }

    public function agregarApoderado($persona_id,$apoderado_id){

        $estudiante=Persona::findOrFail($persona_id);
        $apoderado = Persona::findOrFail($apoderado_id);
        return view('telefono.agregarApoderado',compact('estudiante','apoderado'));
    }

    public function guardarApoderadoExistente(GuardarApoderadoExistenteRequest $request){
            $estudiante_id=$request->persona_id;
            $apoderado_id=$request->apoderado_id;
            $apoderado=Persona::findOrFail($apoderado_id);
            $persona=Persona::findOrFail($estudiante_id);
            $apoderado->telefono=$request->telefono;
            $apoderado->save();
            $persona->apoderados()->attach($apoderado->id, ['telefono' => $request->telefono, 'parentesco' => $request->parentesco]);

            return redirect()->Route('telefonos.persona', ['persona' => $persona]);
        
    }
    public function guardarApoderadoExistenteAjax(Request $request){
        
        $estudiante_id=$request->persona_id;
        $apoderado_id=$request->apoderado_id;
        $apoderado=Persona::findOrFail($apoderado_id);
        $persona=Persona::findOrFail($estudiante_id);
        $apoderado->telefono=$request->telefono;
        $apoderado->save();
        $persona->apoderados()->attach($apoderado->id, ['telefono' => $request->telefono, 'parentesco' => $request->pariente]);

        return response()->json(['mensaje' =>'Registro guardardo correctamente']);
        
    }

    
    public function editar(Persona $persona,$apoderado_id)
    {
        
        $registro_pivot=DB::table('persona_persona')->select('id','persona_id','persona_id_apoderado','parentesco','telefono')
                    ->where('persona_id_apoderado','=',$apoderado_id)
                    ->where('persona_id','=',$persona->id)->get();
        $persona = Persona::findOrFail($apoderado_id);
        return view('telefono.editar',compact('persona','registro_pivot'));
    }

    
    public function actualizar(TelefonoUpdateRequest $request, $persona_id, $apoderado_id)
    {
        $persona=Persona::findOrFail($persona_id);
        $registro_pivot = DB::table('persona_persona')->select('id', 'persona_id', 'persona_id_apoderado', 'parentesco', 'telefono')
        ->where('persona_id_apoderado', '=', $apoderado_id)
            ->where('persona_id', '=', $persona->id)->get();
        $apoderado=Persona::findOrFail($registro_pivot[0]->persona_id_apoderado);
        $apoderado->nombre = $request->nombre;
        $apoderado->apellidop = $request->apellidop;
        $apoderado->apellidom = $request->apellidom;
        $apoderado->genero = $request->genero;
        $apoderado->telefono = $request->telefono;
        $apoderado->save();
        $persona->apoderados()->updateExistingPivot($registro_pivot[0]->persona_id_apoderado,['telefono'=>$request->telefono,'parentesco'=>$request->parentesco],false);
        $apoderados = $persona->apoderados;
        return view('telefono.index', compact('persona', 'apoderados'));
    }
    public function eliminarTelefono(Persona $persona,$id)
    {
        $apoderado=Persona::findOrFail($id);
        $persona->apoderados()->detach($apoderado->id);
        $apoderados = $persona->apoderados;
        $persona->telefono='';
        $persona->save();

        return view('telefono.index',compact('persona','apoderados'));
    }
}
