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
            $nombreImagen='estudiantes/'.Str::random(20).'.jpg';
            /** las convertimos en jpg y la redimensionamos */
            $imagen= Image::make($foto)->encode('jpg',75);
            $imagen->resize(300,300,function($constraint){
                $constraint->upsize();
            });
            /* las guarda en en la carpeta estudiantes  */
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());
            
            $persona->foto = $nombreImagen;
        }
        $persona->como = $request->como;
        $persona->papelinicial = $request->papel;
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
        $pais=Pais::findOrFail($persona->pais_id);
        $ciudad = Ciudad::findOrFail($persona->ciudad_id);
        $zona = Zona::findOrFail($persona->zona_id);

        return view('persona.mostrar',compact('persona','pais','ciudad','zona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        $ciudades = Ciudad::get();
        $paises = Pais::get();
        $zonas = Zona::get();
        $observacion="";
        
        switch ($persona->papelinicial) {

            case 'estudiante':
                $estudiante=$persona->estudiante;
                $observacion=$estudiante->requerimiento;
                break;
            case 'docente':
                $docente = $persona->docente;
                $observacion = $docente->observacion;
                break;
            case 'cliservicio':
                $cliservicio = $persona->cliservicio;
                $observacion = $cliservicio->requerimiento;
                break;
            case 'clicopy':
                $clicopy = $persona->clicopy;
                $observacion = $clicopy->requerimiento;
                break;

            case 'administrativo':
                $administrativo = $persona->administrativo;
                $observacion = $administrativo->requerimiento;
                break;
            case 'proveedor':
                $proveedor = $persona->proveedor;
                $observacion = $proveedor->requerimiento;
                break;
            default:
                # code...
                break;
        }

        return view("persona.editar",compact('persona','paises','ciudades','zonas','observacion'));
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
  
        if ($request->hasFile('foto')) {
            // verificando si exites la foto actual
            if (Storage::disk('public')->exists($persona->foto)) {
                // aquí la borro
                Storage::disk('public')->delete($persona->foto);
            }
//       leandro bruno leaandro
            $foto = $request->file('foto');
            $nombreImagen = 'estudiantes/' . Str::random(20) . '.jpg';
            /** las convertimos en jpg y la redimensionamos */
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            /* las guarda en en la carpeta estudiantes  */
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());

            $persona->foto = $nombreImagen;
        }
        $persona->como = $request->como;
        $persona->papelinicial = $request->papel;
        $persona->persona_id = $request->persona_id;
        $persona->pais_id = $request->pais_id;
        $persona->ciudad_id = $request->ciudad_id;
        $persona->zona_id = $request->zona_id;
        //dd($persona);
        $persona->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //eliminarPersona
    }
    public function eliminarPersona($id){
        $persona = Persona::findOrFail($id);
        $persona->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
}
