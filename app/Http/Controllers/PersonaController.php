<?php

namespace App\Http\Controllers;

use App\Models\Persona;

use App\Models\Ciudad;
use App\Models\Estudiante;
use App\Models\Zona;
use App\Models\Administrativo;
use App\Models\Cliservicio;
use App\Models\Clicopy;
use App\Models\Docente;
use App\Models\Proveedor;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests\PersonaStoreRequest;
use App\Http\Requests\PersonaUpdateRequest;
use App\Http\Requests\PersonaApoderadaRequestStore;

use App\Models\Inscripcione;
use App\Models\Observacion;
use App\Models\Computacion;
use App\Models\Pais;
use Illuminate\Support\Facades\Auth;
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
        //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A    P E R S O N A   %%%%%%%%%%%%%%%%*/
        $persona->userable()->create(['user_id'=>Auth::user()->id]);
        //dd($request->papel);
        switch ($request->papel) {
            
            case 'estudiante':
                $estudiante=new Estudiante();
                $estudiante->persona_id=$persona->id;
                $estudiante->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  E S T U D I A N T E   %%%%%%%%%%%%%%%%*/
                $estudiante->userable()->create(['user_id' => Auth::user()->id]);
                $observacion=new Observacion();
                $observacion->observacion=$request->observacion;
                $observacion->activo=1;
                $observacion->observable_id=$persona->id;
                $observacion->observable_type="App\Models\Persona";
                $observacion->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  O B S E R V A C I O N   %%%%%%%%%%%%%%%%*/
                $observacion->userable()->create(['user_id' => Auth::user()->id]);
                break;
            case 'computacion':
                $computacion=new Computacion();
                $computacion->persona_id=$persona->id;
                $computacion->save();
                
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  E S T U D I A N T E   %%%%%%%%%%%%%%%%*/
                $computacion->userable()->create(['user_id' => Auth::user()->id]);
                $observacion=new Observacion();
                $observacion->observacion=$request->observacion;
                $observacion->activo=1;
                $observacion->observable_id=$persona->id;
                $observacion->observable_type="App\Models\Persona";
                $observacion->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  O B S E R V A C I O N   %%%%%%%%%%%%%%%%*/
                $observacion->userable()->create(['user_id' => Auth::user()->id]);
                break;         
            case 'docente':
                $docente = new Docente();
                $docente->nombre=$persona->nombre.' '.Str::substr($request->apellidop, 0, 1);
                $docente->fecha_ingreso=Carbon::now()->isoFormat('YYYY-MM-DD');
                $docente->dias_prueba = 2;
                $docente->estado = 'actovo';
                $docente->persona_id = $persona->id;
                $docente->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  D O C E N T E   %%%%%%%%%%%%%%%%*/
                $docente->userable()->create(['user_id' => Auth::user()->id]);
                
                $observacion = new Observacion();
                $observacion->observacion = $request->observacion;
                $observacion->activo = 1;
                $observacion->observable_id = $persona->id;
                $observacion->observable_type = "App\Models\Persona";
                $observacion->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  O B S E R V A C I O N   %%%%%%%%%%%%%%%%*/
                $observacion->userable()->create(['user_id' => Auth::user()->id]);

                break;
            case 'cliservicio':
                $cliservicio = new Cliservicio();
                $cliservicio->persona_id = $persona->id;
                $cliservicio->save();

                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   C L I S E R V I C I O   %%%%%%%%%%%%%%%%*/
                $cliservicio->userable()->create(['user_id' => Auth::user()->id]);
                break;
            case 'clicopy':
                $clicopy = new Clicopy();
                $clicopy->persona_id = $persona->id;
                $clicopy->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   C L I C O P Y   %%%%%%%%%%%%%%%%*/
                $clicopy->userable()->create(['user_id' => Auth::user()->id]);
                break;

            case 'administrativo':
                $administrativo = new Administrativo();
                $administrativo->persona_id = $persona->id;
                $administrativo->save();

                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   A D M I N I S T V R V A V T I V O  %%%%%%%%%%%%%%%%*/
                $administrativo->userable()->create(['user_id' => Auth::user()->id]);
                break;
            case 'proveedor':
                $proveedor = new Proveedor();
                $proveedor->persona_id = $persona->id;
                $proveedor->save();

                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   P R O V E E D O R    %%%%%%%%%%%%%%%%*/
                $proveedor->userable()->create(['user_id' => Auth::user()->id]);
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

        
        $observacion = Observacion::where('observable_id', $persona->id)
            ->where('observable_type', Persona::class)->get()->first()->observacion;
        
        $recomendado=Persona::find($persona->persona_id);    
        //dd($recomendado);
        return view('persona.mostrar',compact('persona','pais','ciudad','zona','observacion','recomendado'));
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
        $observacion = Observacion::where('observable_id', $persona->id)
            ->where('observable_type', Persona::class)->get()->first()->observacion;
        
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
    public function update(PersonaUpdateRequest $request, Persona $persona)
    {

        $observacion=$persona->observaciones;
        //dd($observacion);
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
        $persona->telefono = $request->telefono;
        $persona->persona_id = $request->persona_id;
        $persona->pais_id = $request->pais_id;
        $persona->ciudad_id = $request->ciudad_id;
        $persona->zona_id = $request->zona_id;
        //dd($persona);
        $persona->save();

        $observacion_actual = Observacion::where('observable_id',$persona->id)
                                ->where('observable_type',Persona::class)->get()->first();
        
        if($observacion_actual!=null)
        {
            $observacion_actual->observacion = $request->observacion;
            $observacion_actual->save();
            $observacion=$observacion_actual;
        }else{
            $observacion = new Observacion();
            $observacion->observacion = $request->observacion;
            $observacion->activo = 1;
            $observacion->observable_id = $persona->id;
            $observacion->observable_type = Persona::class;
            $observacion->save();
        }
        return redirect()->Route('personas.show', ['persona' => $persona]);
    }

    public function guardarfoto(Request $request, Persona $persona){
        //dd($request->all());

        $image = $request->imagen;  // your base64 encoded
        
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'estudiantes/'.Str::random(20) . '.' . 'png';
        Storage::disk('public')->put($imageName, base64_decode($image));
        //Storage::put(storage_path() . '/public/App/' . $imageName, base64_decode($image));
        $persona->foto=$imageName;
        $persona->save();
        return redirect()->Route('telefonos.crear',['persona'=>$persona]);
    }
    public function guardarfotojpg(Request $request, Persona $persona){
        //dd($request->all());
        
        if ($request->hasFile('foto')) {
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
            $persona->save();
        }
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
