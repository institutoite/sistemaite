<?php

namespace App\Http\Controllers;

use App\Telefono;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function mostrarvista(Persona $persona){
    
        $apoderados= $persona->apoderados;
        return view('telefono.index',compact('persona','apoderados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear(Persona $persona)
    {
        return view('telefono.crear',compact('persona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function show(Telefono $telefono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function edit(Telefono $telefono)
    {
    }
    public function editar(Persona $persona,$id)
    {
        //dd($id);
        
        $registro_pivot=DB::table('persona_persona')->select('id','persona_id','persona_id_apoderado','parentesco','telefono')
                    ->where('persona_id_apoderado','=',$id)
                    ->where('persona_id','=',$persona->id)->get();
        $persona = Persona::findOrFail($id);
        return view('telefono.editar',compact('persona','registro_pivot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telefono $telefono)
    {
        //
    }
    public function actualizar(Request $request, $persona_id, $apoderado_id)
    {
        /** en el registro pivot vienen ambas ids */
        $persona=Persona::findOrFail($persona_id);
        $registro_pivot = DB::table('persona_persona')->select('id', 'persona_id', 'persona_id_apoderado', 'parentesco', 'telefono')
        ->where('persona_id_apoderado', '=', $apoderado_id)
            ->where('persona_id', '=', $persona->id)->get();

        // dd($registro_pivot);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function destroy(Telefono $telefono)
    {
        //
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
