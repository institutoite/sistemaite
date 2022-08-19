<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;

use App\Models\Persona;

use App\Models\Ciudad;
use App\Models\Estudiante;
use App\Models\Zona;
use App\Models\Administrativo;
use App\Models\Cliservicio;
use App\Models\Apoderado;
use App\Models\Docente;
use App\Models\Mensaje;
use App\Models\Proveedor;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests\PersonaStoreRequest;
use App\Http\Requests\PersonaUpdateRequest;
use App\Http\Requests\PersonaApoderadaRequestStore;
use App\Http\Requests\PersonaRapidingoGuardarRequest;

use App\Models\Inscripcione;
use App\Models\Matriculacion;
use App\Models\Observacion;
use App\Models\Computacion;
use App\Models\Interest;
use App\Models\Programacioncom;
use App\Models\Programacion;
use App\Models\Pais;
use App\Models\Felicitado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;


use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Crypt;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('persona.index');
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
        $interests=Interest::all();
        return view('persona.crear',compact('ciudades','paises','zonas','interests'));
    }
    public function crearRapido()
    {
        $interests=Interest::get();
        return view('persona.crearrapido',compact('interests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(PersonaStoreRequest $request)
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
        $persona->habilitado = 1;
        $persona->papelinicial = $request->papel;
        $persona->telefono=$request->telefono;
        $persona->persona_id = $request->persona_id;
        $persona->pais_id = $request->pais_id;
        $persona->ciudad_id = $request->ciudad_id;
        $persona->zona_id = $request->zona_id;
        $persona->save();
        $this->CrearContacto($persona->id);
        $persona->interests()->sync(array_keys($request->interests));
        $user = new User();
        $user->email =strtolower(Str::substr($persona->nombre, 1, 2).$persona->apellidop.$persona->id)."@ite.com.bo" ;
        $user->name = ucfirst(strtolower($persona->nombre).$persona->id);
        $user->persona_id = $persona->id;
        // $user->password = Crypt::encryptString($user->name."*");
        $user->password = Hash::make($user->name."*");
        $user->foto = "estudiantes/sinperfil.png";
        $user->save();
        $user->assignRole('Estudiante');
        //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A    P E R S O N A   %%%%%%%%%%%%%%%%*/
        $persona->usuarios()->attach(Auth::user()->id);
        //dd($request->papel);
        switch ($request->papel) {
            case 'estudiante':
                $computacion=new Computacion();
                $computacion->persona_id=$persona->id;
                $computacion->save();

                $estudiante=new Estudiante();
                $estudiante->persona_id=$persona->id;
                $estudiante->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  E S T U D I A N T E   %%%%%%%%%%%%%%%%*/
                $estudiante->usuarios()->attach(Auth::user()->id);
                $computacion->usuarios()->attach(Auth::user()->id);
                
                $observacion=new Observacion();
                $observacion->observacion=$request->observacion;
                $observacion->activo=1;
                $observacion->observable_id=$persona->id;
                $observacion->observable_type="App\Models\Persona";
                $observacion->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  O B S E R V A C I O N   %%%%%%%%%%%%%%%%*/
                $observacion->usuarios()->attach(Auth::user()->id);
                break;
            case 'computacion':
                $estudiante=new Estudiante();
                $estudiante->persona_id=$persona->id;
                $estudiante->save();

                $computacion=new Computacion();
                $computacion->persona_id=$persona->id;
                $computacion->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  E S T U D I A N T E   %%%%%%%%%%%%%%%%*/
                $computacion->usuarios()->attach(Auth::user()->id);
                $estudiante->usuarios()->attach(Auth::user()->id);
                
                $observacion=new Observacion();
                $observacion->observacion=$request->observacion;
                $observacion->activo=1;
                $observacion->observable_id=$persona->id;
                $observacion->observable_type="App\Models\Persona";
                $observacion->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  O B S E R V A C I O N   %%%%%%%%%%%%%%%%*/
                $observacion->usuarios()->attach(Auth::user()->id);
                break;         
            case 'docente':
                $docente = new Docente();
                $docente->nombre=$persona->nombre.' '.Str::substr($request->apellidop, 0, 1);
                $docente->fecha_ingreso=Carbon::now()->isoFormat('YYYY-MM-DD');
                $docente->dias_prueba = 2;
                $docente->estado = 'activo';
                $docente->persona_id = $persona->id;
                $docente->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  D O C E N T E   %%%%%%%%%%%%%%%%*/
                $docente->usuarios()->attach(Auth::user()->id);
                
                $observacion = new Observacion();
                $observacion->observacion = $request->observacion;
                $observacion->activo = 1;
                $observacion->observable_id = $persona->id;
                $observacion->observable_type = "App\Models\Persona";
                $observacion->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  O B S E R V A C I O N   %%%%%%%%%%%%%%%%*/
                $observacion->usuarios()->attach(Auth::user()->id);

                break;
            case 'cliservicio':
                $cliservicio = new Cliservicio();
                $cliservicio->persona_id = $persona->id;
                $cliservicio->save();

                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   C L I S E R V I C I O   %%%%%%%%%%%%%%%%*/
                $cliservicio->usuarios()->attach(Auth::user()->id);
                break;
            case 'clicopy':
                $clicopy = new Clicopy();
                $clicopy->persona_id = $persona->id;
                $clicopy->save();
                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   C L I C O P Y   %%%%%%%%%%%%%%%%*/
                $clicopy->usuarios()->attach(Auth::user()->id);
                break;

            case 'administrativo':
                $administrativo = new Administrativo();
                $administrativo->cargo="Prueba";
                $administrativo->persona_id = $persona->id;
                $administrativo->save();

                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   A D M I N I S T V R V A V T I V O  %%%%%%%%%%%%%%%%*/
                $administrativo->usuarios()->attach(Auth::user()->id);
                break;
            case 'proveedor':
                $proveedor = new Proveedor();
                $proveedor->persona_id = $persona->id;
                $proveedor->save();

                //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   P R O V E E D O R    %%%%%%%%%%%%%%%%*/
                $proveedor->usuarios()->attach(Auth::user()->id);
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
        $apoderado->apellidom = $request->apellidom;
        $apoderado->genero=$request->genero;
        $apoderado->pais_id = $persona->pais_id;
        $apoderado->ciudad_id = $persona->ciudad_id;
        $apoderado->zona_id = $persona->zona_id;
        $apoderado->habilitado = 0;
        $apoderado->votos = 0;

        $apoderado->telefono=$request->telefono;
        $apoderado->papelinicial = 'apoderado';
        $apoderado->save();

        $user = new User();
        $user->email =strtolower(Str::substr($apoderado->nombre, 1, 2).$apoderado->apellidop.$apoderado->id)."@ite.com.bo" ;
        $user->name = ucfirst(strtolower($apoderado->nombre).$apoderado->id);
        $user->persona_id = $apoderado->id;
        $user->password = Hash::make($user->name."*");
        $user->foto = "estudiantes/sinperfil.png";
        $user->save();

        $apoderado->usuarios()->attach(Auth::user()->id);
        $observacion = new Observacion();
        $observacion->observacion = "Se registró a sistema como un apoderado";
        $observacion->activo = 1;
        $observacion->observable_id = $apoderado->id;
        $observacion->observable_type = "App\Models\Persona";
        $observacion->save();

        $observacion->usuarios()->attach(Auth::user()->id);

        $persona->apoderados()->attach($apoderado->id, ['telefono' => $request->telefono, 'parentesco' => $request->parentesco]);
        $apoderados = $persona->apoderados;
        $this->CrearContacto($persona->id);
        return redirect()->route('telefonos.persona',['persona'=>$persona,'apoderados'=>$apoderados])->with('mensaje','Contacto Creado Corectamente');

    }
    public function guardarRapidingo(PersonaRapidingoGuardarRequest $request){
        $persona=new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellidop = $request->apellidop;
        $persona->telefono=$request->telefono;
        $persona->habilitado = 0;
        $persona->votos = 1;
        $persona->papelinicial = 'estudiante';
        $persona->save();
        
        $this->CrearContacto($persona->id);

        $persona->interests()->sync(array_keys($request->interests));
        $persona->usuarios()->attach(Auth::user()->id);
        $observacion = new Observacion();
        $observacion->observacion = $request->observacion;
        $observacion->activo = 1;
        $observacion->observable_id = $persona->id;
        $observacion->observable_type = "App\Models\Persona";
        $observacion->save();
        $observacion->usuarios()->attach(Auth::user()->id);
        return redirect()->route('telefonos.crear',['persona'=>$persona])->with('mensaje','Contacto Creado Corectamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {   
        if(is_null($persona->pais_id)){
            return redirect()->route('personas.edit',$persona);
        }
        $pais=Pais::findOrFail($persona->pais_id);
        $ciudad = Ciudad::findOrFail($persona->ciudad_id);
        $zona = Zona::findOrFail($persona->zona_id);

        $observacion = Observacion::where('observable_id', $persona->id)
            ->where('observable_type', Persona::class)->get();

        if(count($observacion)>0){
            $observacion=$observacion->first();
        }   

        $recomendado=Persona::find($persona->persona_id); 
        $apoderados=$persona->apoderados;

        $calificaciones=Persona::join('calificacions','personas.id','calificacions.persona_id')
            ->join('users','users.id','calificacions.user_id')
            ->where('calificacions.persona_id',$persona->id)
            ->select('calificacion','users.foto','calificacions.created_at')
            ->get();
        $calificado=$persona->calificaciones->where('user_id',Auth::user()->id)->count();
        $promedio=round($persona->calificaciones->avg('calificacion'),1);

        if($persona->calificaciones->where('user_id',Auth::user()->id)->first()!=null)
            $micalificacion=$persona->calificaciones->where('user_id',Auth::user()->id)->first()->calificacion;
        else 
            $micalificacion=null;
            $user=$persona->usuarios->first();
        $observaciones=$persona->observaciones;
        return view('persona.mostrar',compact('persona','pais','ciudad','zona','observacion','recomendado','apoderados','calificado','promedio','calificaciones','micalificacion','user','observaciones'));
    }

    public function personaMostrarAjax(Request $request){
        $persona = Persona::findOrFail($request->persona_id);
        $pais=Pais::findOrFail($persona->pais_id);
        $ciudad=Ciudad::findOrFail($persona->ciudad_id);
        $zona=Zona::findOrFail($persona->zona_id);
        $edad=$persona->fechanacimiento->diffForHumans();
        $creado=$persona->created_at->diffForHumans();
        $actualizado=$persona->updated_at->diffForHumans();
        $data=['persona'=>$persona, 'pais'=>$pais, 'ciudad'=>$ciudad, 'zona'=>$zona,'edad'=>$edad,'creado'=>$creado, 'actualizado'=>$actualizado];
        return response()->json($data);
    }
    public function personaMostrarAjaxInscripcion(Request $request){
        $persona = Inscripcione::findOrFail($request->inscripcion_id)->estudiante->persona;
        $pais=Pais::findOrFail($persona->pais_id);
        $ciudad=Ciudad::findOrFail($persona->ciudad_id);
        $zona=Zona::findOrFail($persona->zona_id);
        $edad=$persona->fechanacimiento->diffForHumans();
        $creado=$persona->created_at->diffForHumans();
        $actualizado=$persona->updated_at->diffForHumans();
        $data=['persona'=>$persona, 'pais'=>$pais, 'ciudad'=>$ciudad, 'zona'=>$zona,'edad'=>$edad,'creado'=>$creado, 'actualizado'=>$actualizado];
        return response()->json($data);
    }

    public function personaMostrarAjaxMatriculacion(Request $request){
        //return response()->json($request->all());
        $persona = Matriculacion::findOrFail($request->matriculacion_id)->computacion->persona;
        $pais=Pais::findOrFail($persona->pais_id);
        $ciudad=Ciudad::findOrFail($persona->ciudad_id);
        $zona=Zona::findOrFail($persona->zona_id);
        $edad=$persona->fechanacimiento->diffForHumans();
        $creado=$persona->created_at->diffForHumans();
        $actualizado=$persona->updated_at->diffForHumans();
        $data=['persona'=>$persona, 'pais'=>$pais, 'ciudad'=>$ciudad, 'zona'=>$zona,'edad'=>$edad,'creado'=>$creado, 'actualizado'=>$actualizado];
        return response()->json($data);
    }



    public function edit(Persona $persona)
    {
        $ciudades = Ciudad::get();
        $paises = Pais::get();
        $zonas = Zona::get();
        $observacion = Observacion::where('observable_id', $persona->id)
            ->where('observable_type', Persona::class)->get()->first();
        if($observacion!=null){
            $observacion=$observacion->observacion;
        }
        $interests_currents=$persona->interests; 
        $ids=[];
        foreach ($interests_currents as $interest) {
            $ids[] = $interest->id;
        }
        $interests_faltantes = Interest::whereNotIn('id', $ids)->get();
        //dd($interests_faltantes);
        
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

        return view("persona.editar",compact('persona','paises','ciudades','zonas','observacion','interests_currents','interests_faltantes'));
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
        $persona->nombre = $request->nombre;
        $persona->apellidop = $request->apellidop;
        $persona->apellidom = $request->apellidom;
        $persona->fechanacimiento = $request->fechanacimiento;
        $persona->direccion = $request->direccion;
        $persona->carnet = $request->carnet;
        $persona->expedido = $request->expedido;
        $persona->genero = $request->genero;
        $persona->habilitado=1;
        
        if ($request->hasFile('foto')) {
            // verificando si exites la foto actual
            if (Storage::disk('public')->exists($persona->foto)) {
                // aquí la borro
                Storage::disk('public')->delete($persona->foto);
            }
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
        
        $persona->interests()->sync(array_keys($request->interests));


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
        $image = $request->imagen;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'estudiantes/'.Str::random(20) . '.' . 'png';
        Storage::disk('public')->put($imageName, base64_decode($image));
        //Storage::put(storage_path() . '/public/App/' . $imageName, base64_decode($image));
        $persona->foto=$imageName;
        $persona->save();
        $user=$persona->user;
        $user->foto=$persona->foto;
        $user->save();

        return redirect()->Route('telefonos.crear',['persona'=>$persona]);
    }
    public function guardarfotojpg(Request $request, Persona $persona){
        //dd($request->all());
        
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreImagen = 'estudiantes/' . Str::random(20) . '.jpg';
            /** las convertimos en jpg y la redimensionamos */
            $imagen = Image::make($foto)->encode('jpg', 100);
            $imagen->resize(800, 800, function ($constraint) {
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
    
    public function configurar_papeles($persona_id){
        $persona= Persona::findOrFail($persona_id);
        //dd($persona->administrativo->id);
        $papelesActuales=collect([]);
        $papelesFaltantes=collect([]);
        
        if($persona->estudiante == null){
            $papelesFaltantes->push('estudiante');
        }else{
            $papelesActuales->push('estudiante');
        }
        if($persona->computacion == null){
            $papelesFaltantes->push('computacion');
        }else{
            $papelesActuales->push('computacion');
        }
        if($persona->docente == null){
            $papelesFaltantes->push('docente');
        }else{
            $papelesActuales->push('docente');
        }
        if($persona->administrativo == null){
            $papelesFaltantes->push('administrativo');
        }else{
            $papelesActuales->push('administrativo');
        }
        
        if($persona->cliservicio == null){
            $papelesFaltantes->push('cliservicio');
        }else{
            $papelesActuales->push('cliservicio');
        }
        
        return view('persona.papeles',compact('papelesActuales','papelesFaltantes','persona'));
    }

    public function guardarNuevoPapel(Request $request,$persona_id){
        $persona=Persona::findOrFail($persona_id);
        $cuantas_papeles=count($request->papelesFalta);
        $i=0;
        $c="";
        $nuevosPapeles=$request->papelesFalta;
        while($i<$cuantas_papeles){
            if($nuevosPapeles[$i]=='estudiante'){
                Estudiante::create([
                    'persona_id'=>$persona->id,
                ]);
            }
            if($nuevosPapeles[$i]=='computacion'){
                Computacion::create([
                    'persona_id'=>$persona->id,
                ]);
            }
            if($nuevosPapeles[$i]=='docente'){
                Docente::create([
                    'sueldo'=>0,
                    'fecha_ingreso'=> Carbon::now()->format('Y-m-d'),
                    'nombre'=>$persona->nombre." ". $persona->apellidop,
                    'estado'=>'activo',
                    'dias_prueba'=>2,
                    'persona_id'=>$persona->id,
                ]);
            }
            if($nuevosPapeles[$i]=='administrativo'){

            }
            if($nuevosPapeles[$i]=='cliservicio'){
                Cliservicio::create([
                    'persona_id'=>$persona->id,
                    'requerimiento'=>"Esto es un requerimiento",
                ]);
            }
            $i=$i+1;
        }
        return redirect()->route('personas.index');
    }
    public function potenciales(Request $request){
        $potenciales= Persona::join('interest_persona','interest_persona.persona_id','personas.id')
        ->join('interests','interests.id','interest_persona.interest_id')
        ->where('habilitado',0)
        ->where('votos',1)
        ->select('personas.id','personas.nombre','personas.apellidop','interests.interest')  
        ->get();

        return DataTables::of($potenciales)
                ->addColumn('btn','persona.actionpotenciales')
                ->rawColumns(['btn'])
                ->toJson();
    }
    public function verPotencial(Request $request){
        $potencial= Persona::findOrFail($request->persona_id);
        $observaciones=Observacion::join('personas','personas.id','observacions.observable_id')
        ->join('userables','userables.userable_id','observacions.id')
        ->join('users','users.id','userables.user_id') 
        ->where('userables.userable_type',Observacion::class)
        ->where('observacions.observable_type',Persona::class)
        ->where('personas.id',$request->persona_id)
        ->select('observacions.id','observacion','name')
        ->get();
        $apoderados=$potencial->apoderados;
        $interests=$potencial->interests;
        $autorPotencial=$potencial->usuarios->first()->name;

        $data=['intereses'=>$interests,'potencial'=>$potencial,'observaciones'=>$observaciones,'apoderados'=>$apoderados,'autorPotencial'=>$autorPotencial];
        return response()->json($data);
    }

    public function unsuscribe(Request $request){
        $persona= Persona::findOrFail($request->persona_id);
        $persona->votos=0;
        $persona->save();
        return response()->json(["mensaje"=>"El cambio se realizo correctamente"]);
    }
    public function ImprimirPotencial($persona_id){
        $inscripcion=Persona::findOrFail($inscripcione_id);
        $programacion = Persona::join('materias', 'programacions.materia_id', '=', 'materias.id')
            ->join('aulas', 'programacions.aula_id', '=', 'aulas.id')
            ->join('docentes', 'programacions.docente_id', '=', 'docentes.id')
            ->join('personas', 'personas.id', '=', 'docentes.persona_id')
            ->select('programacions.fecha', 'hora_ini','programacions.habilitado', 'hora_fin', 'horas_por_clase', 'personas.nombre', 'materias.materia', 'aulas.aula', 'programacions.habilitado')
            ->orderBy('fecha', 'asc')
            ->where('inscripcione_id', '=', $inscripcione_id)->get();
        $estudiante = Estudiante::findOrFail($inscripcion->estudiante_id);
        $persona = $estudiante->persona;
        $colegio=Colegio::find($estudiante->grados->last()->pivot->colegio_id);
        $usuario=$inscripcion->usuarios->first();
        $modalidad=$inscripcion->modalidad;
        $nivel=Nivel::findOrFail($estudiante->grados->last()->nivel_id);
        $grado=Grado::findOrFail($estudiante->grados->last()->pivot->grado_id);
        $dompdf = PDF::loadView('programacion.reporte', compact('grado','nivel','modalidad','usuario','programacion','persona','estudiante','persona','colegio','inscripcion'));
        /**entrae a la persona al cual corresponde esta inscripcion */
        $fecha_actual = Carbon::now();
        $fecha_actual->isoFormat('DD-MM-YYYY-HH:mm:ss');
        $dompdf->setPaper('letter','portrait');
        return $dompdf->download($persona->id . '_' . $fecha_actual . '_' . $persona->nombre . '_' . $persona->apellidop . '.pdf');
    }
    public function ultimaObservacion(Request $request){
        $observacion=Persona::findOrFail($request->persona_id)->observaciones->last();
        $usuario=$observacion->usuarios->first();
        $data=['observacion'=>$observacion,'usuario'=>$usuario];
        return response()->json($data);
    }

     public function ultimaInscripcion(Request $request){
        $inscripcion=Persona::findOrFail($request->persona_id)->estudiante->inscripciones->last();
        $materia=$inscripcion->materia;
        $usuario=$inscripcion->usuarios->first();
        $motivo=$inscripcion->motivo;
        $empezo=$inscripcion->fechaini->diffForHumans();    
        $finaliza=$inscripcion->fechafin->diffForHumans();    
        $proximo_pago=$inscripcion->fecha_proximo_pago->diffForHumans();    
        $creado=$inscripcion->created_at->diffForHumans();
        $actualizado=$inscripcion->updated_at->diffForHumans();
        $data=[
            'inscripcion'=>$inscripcion,
            'usuario'=>$usuario,
            'materia'=>$materia,
            'motivo'=>$motivo,
            'empezo'=>$empezo,
            'finaliza'=>$finaliza,
            'proximo_pago'=>$proximo_pago,
            'creado'=>$creado, 
            'actualizado'=>$actualizado,
        ];

        return response()->json($data);
    }
    // public function ultimaProgramacion(Request $request){
    public function ultimaProgramacion(Request $request){
        $inscripcion=Persona::findOrFail($request->persona_id)->estudiante->inscripciones->last();
        // $inscripcion=Persona::findOrFail(2)->estudiante->inscripciones->last();
        
        $programaciones=Programacion::join('docentes','docentes.id','=','programacions.docente_id')
                    ->join('aulas','aulas.id','=','programacions.aula_id')
                    ->join('inscripciones','inscripciones.id','=','programacions.inscripcione_id')
                    ->join('materias','materias.id','=','programacions.materia_id')
                    ->join('estados','estados.id','=','programacions.estado_id')
                    ->where('inscripcione_id',$inscripcion->id)
                    ->select('programacions.id','fecha','estados.estado','materia','docentes.nombre','programacions.hora_ini','programacions.hora_fin','horas_por_clase','aulas.aula','programacions.habilitado')->get();
        return response()->json($programaciones);
    }

    // $programaciones = Programacion::join('aulas', 'programacions.aula_id', '=', 'aulas.id')
    //     ->join('docentes', 'programacions.docente_id', '=', 'docentes.id')
    //     ->join('materias', 'programacions.docente_id', '=', 'docentes.id')
    //     ->join('estados','estados.id','programacions.estado_id')
    //     ->where('programacions.inscripcione_id', '=', $inscripcion->id)
    //     ->select('programacions.fecha','nombre','hora_ini','estados.estado','programacions.habilitado','materias.materia', 'hora_fin', 'horas_por_clase', 'aulas.aula')
    //     ->orderBy('fecha', 'asc')->get();

    public function ultimaMatriculacion(Request $request){
        
        $matriculacion=Persona::findOrFail($request->persona_id)->computacion->matriculaciones->last();
        $asignatura=$matriculacion->asignatura;
        $usuario=$matriculacion->usuarios->first();
        $motivo=$matriculacion->motivo;
        $empezo=$matriculacion->fechaini->diffForHumans();    
        $finaliza=$matriculacion->fechafin->diffForHumans();    
        $proximo_pago=$matriculacion->fecha_proximo_pago->diffForHumans();    
        $creado=$matriculacion->created_at->diffForHumans();
        $actualizado=$matriculacion->updated_at->diffForHumans();

        $data=[
            'matriculacion'=>$matriculacion,
            'usuario'=>$usuario,
            'asignatura'=>$asignatura,
            'motivo'=>$motivo,
            'empezo'=>$empezo,
            'finaliza'=>$finaliza,
            'proximo_pago'=>$proximo_pago,
            'creado'=>$creado, 
            'actualizado'=>$actualizado,
        ];

        return response()->json($data);
    }

    public function ultimaProgramacioncom(Request $request){
         $matriculacion=Persona::findOrFail($request->persona_id)->computacion->matriculaciones->last();
         $programacioncoms = Programacioncom::join('aulas', 'programacioncoms.aula_id', '=', 'aulas.id')
            ->join('docentes', 'programacioncoms.docente_id', '=', 'docentes.id')
            ->join('estados','estados.id','programacioncoms.estado_id')
            ->select('programacioncoms.fecha','nombre', 'habilitado','horaini','estados.estado', 'horafin', 'horas_por_clase', 'aulas.aula')
            ->orderBy('fecha', 'asc')
            ->where('programacioncoms.matriculacion_id', '=', $matriculacion->id)->get();
        return response()->json($programacioncoms);
    }
    public function enviarMensaje(Request $request){
        $persona=Persona::findOrFail($request->persona_id);
        $apoderados= $persona->apoderados;
        $data=['persona'=>$persona,'apoderados'=>$apoderados];
        return response()->json($data);
    }
    
    public function enviarMensajeCumpleanero(Request $request){
        $mensaje=strip_tags(Mensaje::findOrFail(1)->mensaje);
        $persona=Persona::findOrFail($request->persona_id);
        $apoderados= $persona->apoderados;
        $data=['persona'=>$persona,'apoderados'=>$apoderados,'mensaje'=>$mensaje];
        return response()->json($data);
    }
    public function enviarMensajeFaltones(Request $request){
        $observacion = new Observacion();
        $observacion->observacion=Auth::user()->name .": Informo sobre la falta de esta clase en fecha y  hora: ". Carbon::now()->format('Y-m-d H:i');
        $observacion->activo=1;
        $observacion->observable_id=$request->programacion_id;
        $observacion->observable_type=Programacion::class;
        $observacion->save();

        $programacion=Programacion::findOrFail($request->programacion_id);
        $programacion->estado_id=estado("FALTANOTIFICADA");
        $programacion->save();

        $observacion->usuarios()->attach(Auth::user()->id);
        $mensaje=strip_tags(Mensaje::findOrFail(2)->mensaje)."%0A*Detalle de la clase:*%0A".$this->FormatearProgramacion($programacion);
        $persona=Persona::findOrFail($request->persona_id);
        $apoderados= $persona->apoderados;
        $data=['persona'=>$persona,'apoderados'=>$apoderados,'mensaje'=>$mensaje,'programacion'=>$programacion];
        return response()->json($data);
    }

    public function FormatearProgramacion($programacion){
        $texto="*Fecha:* ".$programacion->fecha->format('d-m-Y')."%0A";
        $texto.="*Horario:* ".$programacion->hora_ini->isoFormat('hh:mm:ss').' - '.$programacion->hora_fin->isoFormat('hh:mm:ss')."%0A";
        $texto.="*Docente:* ".$programacion->docente->nombre."%0A";
        $texto.="*Materia:* ".$programacion->materia->materia."%0A";
        $texto.="*Estado de Clase:* ".$programacion->estado->estado."%0A";
        return $texto;
    }
    public function FormatearProgramacioncom($programacioncom){
        $texto="*Fecha:* ".$programacioncom->fecha->format('d-m-Y')."%0A";
        $texto.="*Horario:* ".$programacioncom->horaini->isoFormat('hh:mm:ss').' - '.$programacioncom->horafin->isoFormat('hh:mm:ss')."%0A";
        //$texto.="*Docente:* ".$programacioncom->docente->nombre."%0A";
        //$texto.="*Asignatura:* ".$programacioncom->asingatura->asignatura."%0A";
        $texto.="*Estado de Clase:* ".$programacioncom->estado->estado."%0A";
        return $texto;
    }
    public function enviarMensajeFaltonesComputacion(Request $request){
        $observacion = new Observacion();
        $observacion->observacion=Auth::user()->name .": Informo sobre la falta de esta clase en fecha y  hora: ". Carbon::now()->format('Y-m-d H:i');
        $observacion->activo=1;
        $observacion->observable_id=$request->programacioncom_id;
        $observacion->observable_type=Programacioncom::class;
        $observacion->save();
        $observacion->usuarios()->attach(Auth::user()->id);
        $programacioncom=Programacioncom::findOrFail($request->programacioncom_id);
        $programacioncom->estado_id=estado("FALTANOTIFICADA");
        $programacioncom->save();
        $mensaje=strip_tags(Mensaje::findOrFail(3)->mensaje)."%0A*Detalle de la clase:*%0A".$this->FormatearProgramacioncom($programacioncom);
        $persona=Persona::findOrFail($request->persona_id);
        $apoderados= $persona->apoderados;


        $data=['persona'=>$persona,'apoderados'=>$apoderados,'mensaje'=>$mensaje,'programacioncom'=>$programacioncom];
        return response()->json($data);
    }

    public function CrearContacto($persona_id){
        $persona=Persona::find($persona_id);
        $nombre_archivo='contactos/'.$persona->id.'.vcf';
        Storage::append($nombre_archivo, 'BEGIN:VCARD');
        Storage::append($nombre_archivo, 'VERSION:3.0');
        $apellidoMaterno = isset($persona->apellidom) ? $persona->apellidom : '-';
        Storage::append($nombre_archivo, 'N:'.$persona->apellidop.';'.$persona->nombre.';'.$apellidoMaterno.";;");
        Storage::append($nombre_archivo, 'FN:'.$persona->apellidop.' '.$persona->nombre.' '.$apellidoMaterno);
        $foto = isset($persona->foto) ? $persona->foto : '-';
        Storage::append($nombre_archivo, "PHOTO;VALUE=uri".URL::to('/').Storage::url($foto));
        if (isset($persona->fechanacimiento)){
            Storage::append($nombre_archivo, 'BDAY:'.$persona->fechanacimiento->isoFormat('YYYY-MM-DD'));
        }
        $genero = isset($persona->genero) ? $persona->genero : '';
        if($genero=="MUJER")
            Storage::append($nombre_archivo, 'GENDER:F');
        else{
            Storage::append($nombre_archivo, 'GENDER:M');
        }
        $telefono = isset($persona->telefono) ? $persona->telefono : '0';
        Storage::append($nombre_archivo, "TEL;VALUE=uri;PREF=1;TYPE=voice,work:".$persona->telefono);
        $whatsapp = ($telefono!=0) ? $telefono : 'No tiene numero';
        Storage::append($nombre_archivo, "URL:wa.me/591".$whatsapp);

        $zona = isset($persona->zona) ? $persona->zona->zona : '-';
        $direccion = isset($persona->direccion) ? $persona->direccion : '-';
        $como = isset($persona->como) ? $persona->como : '-';
        
        if(isset($persona->como)){
            $como=$persona->como;
        }
        Storage::append($nombre_archivo, "NOTE:Genero:".$genero.'\nDireccion:'.$zona.' '.$direccion.'\nComo eneteró:'.$como);

        $apoderados=$persona->apoderados;
            
            foreach ($apoderados as $apoderado) {
                Storage::append($nombre_archivo, "TEL;VALUE=uri;PREF=1;TYPE=voice,home:".$apoderado->telefono);
                Storage::append($nombre_archivo, "NOTE:Nombre:".$apoderado->nombre.' '.$apoderado->apellidop.' '.$apoderado->apellidom.'\nPARENTESCO:'.$apoderado->pivot->parentesco.'\nTelefono:'.$apoderado->telefono);
                Storage::append($nombre_archivo, "URL:wa.me/591".$apoderado->telefono);

            }
        
        
        if (isset($persona->estudiante->inscripciones)){
            $inscripciones=$persona->estudiante->inscripciones;
            foreach ($inscripciones as $inscripcion) {
                Storage::append($nombre_archivo, "NOTE:Modalidad:".$inscripcion->modalidad->modalidad.'\nObservacion:'.$inscripcion->objetivo.'\nVigente:'.$inscripcion->vigente.'\nMotivo:'.$inscripcion->motivo);
            }
        }    
        
        if(isset($persona->computacion->matriculaciones)){
            $matriculaciones=$persona->computacion->matriculaciones;
            foreach ($matriculaciones as $matriculacion) {
                Storage::append($nombre_archivo, "NOTE:Asignatura:".$matriculacion->asignatura->asignatura.'\nVigente:'.$matriculacion->vigente);
            }
        }
        Storage::append($nombre_archivo, "LANG;TYPE=work;PREF=2:es");
        Storage::append($nombre_archivo, "TITLE:".$persona->papelinicial);
        
        $roles="";
        if($persona->isEstudiante()){
            $roles.="ESTUDIANTE,";
        }
        if($persona->isDocente()){
            $roles.="DOCENTE,";
        }
        if($persona->isAdministrativo()){
            $roles.="ADMINISTRATIVO,";
        }
        if($persona->isComputacion()){
            $roles.="COMPUTACION,";
        }
        Storage::append($nombre_archivo, "ROLE:".$roles);
        Storage::append($nombre_archivo, "LOGO:".$persona->foto);
        Storage::append($nombre_archivo, "ORG:".$persona->empresa);
        $intereses=$persona->interests;
        $categorias="";
        foreach ($intereses as $categoria) {
            $categorias.=$categoria->interest.",";
        }
        Storage::append($nombre_archivo, "NOTE:INTERESES:".$categorias);
        $observacioninicial=$persona->observaciones->first();
        $observacionfinal=$persona->observaciones->last();
        if (isset($observacioninicial->observacion)){
            Storage::append($nombre_archivo, "NOTE:".$observacioninicial->observacion);
            Storage::append($nombre_archivo, "NOTE:".$observacionfinal->observacion);
        }
        Storage::append($nombre_archivo, 'END:VCARD');
        $contacto=Storage::disk('public')->put($nombre_archivo,'Contents');
    }
    public function descargarContacto($persona){
        
        $url=storage_path("app\\contactos\\".$persona.".vcf");
        if(!is_null($url)){
            if (file_exists($url)){
                if (unlink($url)) {
                    $this->CrearContacto($persona);
                }         
            }
        }
       
        return response()->download($url);
    }
    public function actualizarVuelveFecha(Request $request)
    {
        //return response()->json($request->all());
        $validator = Validator::make($request->all(), [
            'vuelvefecha' => ['required','min:5','max:30'],  /* https://laraveles.com/foro/viewtopic.php?id=6764 */
        ]);
        if ($validator->passes()) {
            $persona=Persona::findOrFail($request->persona_id);
            $persona->vuelvefecha = $request->vuelvefecha;
            $persona->save();
            return response()->json(['persona' => $persona]);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }
    public function actualizarVolvera(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'volvera' => ['numeric','required','min:1','max:5'],  /* https://laraveles.com/foro/viewtopic.php?id=6764 */
        ]);
        if ($validator->passes()) {
            $persona=Persona::findOrFail($request->persona_id);
            $persona->volvera = $request->volvera;
            $persona->save();
            return response()->json(['persona' => $persona]);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }
    public function felicitado(Request $request){
        $felicitado=new Felicitado();
        $felicitado->anio=Carbon::now()->year;
        $felicitado->persona_id=$request->persona_id;
        $felicitado->save();
        return response()->json($felicitado);
    }
}