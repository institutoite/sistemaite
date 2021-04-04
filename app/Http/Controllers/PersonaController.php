<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Pais;
use App\Ciudad;
use App\Estudiante;
use App\Zona;
use App\Administrativo;
use App\Cliservicio;
use App\Clicopy;
use App\Docente;
use App\Proveedor;


use Illuminate\Http\Request;
use App\Http\Requests\PersonaStoreRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;



class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           //return Persona::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades=Ciudad::get();
        $paises=Pais::get();
        $zonas=Zona::get();
        return view('persona.crear',compact('ciudades','paises','zonas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaStoreRequest $request)
    {
        $persona=new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellidop = $request->apellidop;
        $persona->apellidom = $request->apellidom;
        $persona->fechanacimiento = $request->fechanacimiento;
        $persona->direccion = $request->direccion;
        $persona->carnet = $request->carnet;
        $persona->expedido = $request->expedido;
        $persona->genero = $request->genero;
        //$persona->observacion = $request->observacion;
        /* Guardar una imagen en storage si llega una foto*/
        if ($request->hasFile('foto')){
            $foto=$request->file('foto');
            $nombreImagen=Str::random(20).'.jpg';
            /** las convertimos en jpg y la redimensionamos */
            $imagen= Image::make($foto)->encode('jpg',75);
            $imagen->resize(300,300,function($constraint){
                $constraint->upsize();
            });
            /* las guarda en en la carpeta estudiantes  */
            $fotillo = Storage::disk('public')->put('estudiantes/'.$nombreImagen, $imagen->stream());
            
            $persona->foto = $nombreImagen;
        }
        $persona->como = $request->como;
        $persona->persona_id = $request->persona_id;
        $persona->pais_id = $request->pais_id;
        $persona->ciudad_id = $request->ciudad_id;
        $persona->zona_id = $request->zona_id;
        $persona->save();
        //dd($request->papel);
        switch ($request->papel) {
            
            case 'estudiante':
                $estudinate=new Estudiante();
                $estudinate->requerimiento=$request->observacion;
                $estudinate->persona_id=$persona->id;
                $estudinate->save();
                break;
            case 'docente':
                $docente = new Docente();
                $docente->observacion = $request->observacion;
                $docente->persona_id = $persona->id;
                $docente->save();
                break;
            case 'cliservicio':
                $cliservicio = new Cliservicio();
                $cliservicio->requerimiento = $request->observacion;
                $cliservicio->persona_id = $persona->id;
                $cliservicio->save();
                break;
            case 'clicopy':
                $clicopy = new Clicopy();
                $clicopy->requerimiento = $request->observacion;
                $clicopy->persona_id = $persona->id;
                $clicopy->save();
                break;

            case 'administrativo':
                $administrativo = new Administrativo();
                $administrativo->observacion = $request->observacion;
                $administrativo->persona_id = $persona->id;
                $administrativo->save();
                break;
            case 'proveedor':
                $proveedor = new Proveedor();
                $proveedor->observacion = $request->observacion;
                $proveedor->persona_id = $persona->id;
                $proveedor->save();
                break;
            default:
                # code...
                break;
        }

        /**
         * en esta parte elegimos que tipo de persona eligio el usuario
         * estudiante, docente, cliservicio, administrativo
         * 
         */

        return view('persona.index',compact('persona'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
