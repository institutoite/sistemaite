<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Pais;
use App\Models\Ciudad;
use App\Models\Estudiante;
use App\Models\Zona;
use App\Models\Administrativo;
use App\Models\Cliservicio;
use App\Models\Clicopy;
use App\Models\Docente;
use App\Models\Proveedor;
use App\Models\Telefono;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests\PersonaStoreRequest;
use App\Http\Requests\PersonaApoderadaRequestStore;

use App\Models\Inscripcione;
use App\Models\Observacion;
use Illuminate\Support\Facades\Date;
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
        $persona->telefono=$request->telefono;
        $persona->persona_id = $request->persona_id;
        $persona->pais_id = $request->pais_id;
        $persona->ciudad_id = $request->ciudad_id;
        $persona->zona_id = $request->zona_id;
        $persona->save();
        //dd($request->papel);
        switch ($request->papel) {
            
            case 'estudiante':
                $estudinate=new Estudiante();
                $estudinate->persona_id=$persona->id;
                $estudinate->save();
                $obervacion=new Observacion();
                $obervacion->observacion=$request->observacion;
                $obervacion->activo=1;
                $obervacion->observable_id=$persona->id;
                $obervacion->observable_type=Inscripcione::class;
                break;
            case 'docente':
                $docente = new Docente();
                $docente->nombre=$persona->nombre.' '.Str::substr($request->apellidop, 0, 1);
                $docente->fecha_ingreso=Carbon::now()->isoFormat('YYYY-MM-DD');
                $docente->dias_prueba = 2;
                $docente->estado = 'actovo';
                $docente->persona_id = $persona->id;
                $docente->save();
                break;
            case 'cliservicio':
                $cliservicio = new Cliservicio();
                $cliservicio->persona_id = $persona->id;
                $cliservicio->save();
                break;
            case 'clicopy':
                $clicopy = new Clicopy();
                $clicopy->persona_id = $persona->id;
                $clicopy->save();
                break;

            case 'administrativo':
                $administrativo = new Administrativo();
                $administrativo->persona_id = $persona->id;
                $administrativo->save();
                break;
            case 'proveedor':
                $proveedor = new Proveedor();
                $proveedor->persona_id = $persona->id;
                $proveedor->save();
                break;
            default:
                # code...
                break;
        }

        
        return redirect()->route('tomar.foto.persona',['persona'=>$persona]);
        
    }


    public function storeContacto(PersonaApoderadaRequestStore $request,$id){
        
        $persona=Persona::findOrFail($id);
        $apoderado = new Persona();
        $apoderado->nombre = $request->nombre;
        $apoderado->apellidop = $request->apellidop;
        $apoderado->genero=$request->genero;

        $carbon = new \Carbon\Carbon();
        $date = $carbon::createFromDate(1900, 1, 1);


        $apoderado->fechanacimiento=$date;
        $apoderado->papelinicial = 'apoderado';
        $apoderado->telefono=$request->telefono;
        $apoderado->papelinicial = 'apoderado';
        $apoderado->save();

        $persona->apoderados()->attach($apoderado->id, ['telefono' => $request->telefono, 'parentesco' => $request->parentesco]);
        $apoderados = $persona->apoderados;
        return redirect()->route('telefonos.persona',['persona'=>$persona,'apoderados'=>$apoderados])->with('mensaje','Contacto Creado Corectamente');
        //return view('telefono.index',compact('persona','apoderados'));

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
                break;
            case 'docente':
                $docente = $persona->docente;
                break;
            case 'cliservicio':
                $cliservicio = $persona->cliservicio;
                
                break;
            case 'clicopy':
                $clicopy = $persona->clicopy;
                break;

            case 'administrativo':
                $administrativo = $persona->administrativo;
                break;
            case 'proveedor':
                $proveedor = $persona->proveedor;
                break;
            default:
                # code...ite.com.bo
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

    public function guardarfoto(Request $request, Persona $persona){

        $image = $request->imagen;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'estudiantes/'.Str::random(20) . '.' . 'png';
        Storage::disk('public')->put($imageName, base64_decode($image));
        //Storage::put(storage_path() . '/public/App/' . $imageName, base64_decode($image));
        $persona->foto=$imageName;
        $persona->save();

        $telefonos=Telefono::where('persona_id','=',$persona->id)->get();

        return redirect()->Route('telefonos.crear',['persona'=>$persona]);
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

    public function tomarfoto(Persona $persona){

        return view('persona.tomarfoto', compact('persona'));
    }
}
