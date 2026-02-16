<?php
namespace App\Http\Controllers;
use App\Models\Docente;
use App\Models\Nivel;
use App\Models\Persona;
use App\Models\Pais;
use App\Models\Ciudad;
use App\Models\Estado;
use App\Models\Zona;
use App\Models\Como;
use App\Models\Interest;
use App\Models\Observacion;
use App\Models\User;
use App\Models\Mododocente;
use App\Models\Estudiante;
use App\Models\Programacion;
use App\Models\Inscripcione;
use App\Models\Carrera;
use App\Models\Computacion;
use App\Models\Dia;
use App\Models\DocenteTurno;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PersonaController;
use Barryvdh\DomPDF\Facade as PDF;

use App\Http\Requests\DocenteUpdateRequest;
use App\Http\Requests\PersonaStoreRequest;

class DocenteController extends Controller
{
    








    public function __construct()
    {
        $this->middleware('can:Listar Docentes')->only('index','show');
        $this->middleware('can:Crear Docentes')->only('create','store','GuardarConfigurarNiveles','configurar_niveles');
        $this->middleware('can:Editar Docentes')->only('edit','update');
        $this->middleware('can:Editar Docentes')->only('turnos','guardarTurnos');
        $this->middleware('can:Eliminar Docentes')->only('destroy');
        $this->middleware('can:Consultas Docentes de clases')->only("misEstudiatescomActuales","misEstudiatesProgramados","misEstudiatescomProgramados","misEsperados","misEsperadoscom");
    }

    public function index()
    {
        return view('docente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises=Pais::get();
        $ciudades=Ciudad::get();
        $zonas=Zona::get();
        $interests=Interest::all();
        $comos=Como::all();
        //$docente=$persona->docente;
        $ciudades = Ciudad::get();
        $estados = Estado::get();
        $mododocentes = Mododocente::get();
        return view('docente.create',compact('mododocentes','estados','paises', 'zonas', 'ciudades','interests','comos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaStoreRequest $request)
    {

        if(($request->nombrecorto=="")||($request->fecha_inicio=="")||
            ($request->dias_prueba=="")||($request->sueldo=="")||
            ($request->mododocente_id=="")||($request->estado_id=="")||($request->perfil==""))
        {
            return back()->withInput()->with(['mensaje'=>"Faltan llenar datos"]);
        }

        $persona=new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellidop = $request->apellidop;
        $persona->apellidom = $request->apellidom;
        $persona->fechanacimiento = $request->fechanacimiento;
        $persona->direccion = $request->direccion;
        $persona->carnet = $request->carnet;
        $persona->expedido = $request->expedido;
        $persona->genero = $request->genero;
        if ($request->hasFile('foto')){
            $foto=$request->file('foto');
            $nombreImagen='estudiantes/'.Str::random(20).'.jpg';
            $imagen= Image::make($foto)->encode('jpg',75);
            $imagen->resize(300,300,function($constraint){
                $constraint->upsize();
            });
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());
            $persona->foto = $nombreImagen;
        }
        $persona->como_id = $request->como_id;
        $persona->habilitado = 1;
        $persona->papelinicial = $request->papel;
        $persona->telefono=$request->telefono;
        $persona->persona_id = $request->persona_id;
        $persona->pais_id = $request->pais_id;
        $persona->ciudad_id = $request->ciudad_id;
        $persona->zona_id = $request->zona_id;
        $persona->save();
        $ObjetoPersona=new PersonaController();
        $ObjetoPersona->CrearContacto($persona->id);
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
        $docente = new Docente();

        

        $docente->nombrecorto=$request->nombrecorto;
        $docente->fecha_inicio=$request->fecha_inicio;
        $docente->dias_prueba = $request->dias_prueba;
        $docente->sueldo = $request->sueldo;
        $docente->mododocente_id = $request->mododocente_id;
        $docente->perfil = $request->perfil;
        $docente->estado_id = $request->estado_id;
        $docente->persona_id = $persona->id;
        $docente->save();
        
        $docente->usuarios()->attach(Auth::user()->id);
        $observacion = new Observacion();
        $observacion->observacion = $request->observacion;
        $observacion->activo = 1;
        $observacion->observable_id = $persona->id;
        $observacion->observable_type = "App\Models\Persona";
        $observacion->save();
        //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  O B S E R V A C I O N   %%%%%%%%%%%%%%%%*/
        $observacion->usuarios()->attach(Auth::user()->id);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $docente = Docente::findOrFail($id);
            $persona = $docente->persona;
            if (!$persona) {
                return response()->view('errors.custom', ['mensaje' => 'No se encontró la persona asociada al docente.'], 404);
            }
            $user = $persona->usuarios->first();
            $pais = Pais::find($persona->pais_id);
            $ciudad = Ciudad::find($persona->ciudad_id);
            $zona = Zona::find($persona->zona_id);
            $observacion = Observacion::where('observable_id', $persona->id)
                ->where('observable_type', Persona::class)->get()->first();
            $observaciones = $persona->observaciones;
            $recomendado = Persona::find($persona->persona_id);
            $apoderados = $persona->apoderados;

            $calificaciones = Persona::join('calificacions', 'personas.id', 'calificacions.persona_id')
                ->join('users', 'users.id', 'calificacions.user_id')
                ->where('calificacions.persona_id', $persona->id)
                ->select('calificacion', 'users.foto', 'calificacions.created_at')
                ->get();
            $calificado = $persona->calificaciones->where('user_id', Auth::user()->id)->count();
            $promedio = round($persona->calificaciones->avg('calificacion'), 1);
            if ($persona->calificaciones->where('user_id', Auth::user()->id)->first() != null)
                $micalificacion = $persona->calificaciones->where('user_id', Auth::user()->id)->first()->calificacion;
            else
                $micalificacion = null;

            return view('docente.show', compact('docente', 'persona', 'pais', 'ciudad', 'zona', 'observacion', 'recomendado', 'apoderados', 'calificado', 'promedio', 'calificaciones', 'micalificacion', 'user', 'observaciones'));
        } catch (\Exception $e) {
            return response()->view('errors.custom', ['mensaje' => 'Error al mostrar el docente: ' . $e->getMessage()], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        
        $persona=$docente->persona;
        $docente=$persona->docente;
        $ciudades = Ciudad::get();
        $paises = Pais::get();
        $zonas = Zona::get();
        $estados = Estado::get();
        $mododocentes = Mododocente::get();
        $comos=Como::get();
        $observacion = Observacion::where('observable_id', $persona->id)
            ->where('observable_type', Persona::class)->get()->first();
        if($observacion!=null){
            $observacion=$observacion->observacion;
        }
        //dd($observacion);
        $interests_currents=$persona->interests; 
        $ids=[];
        foreach ($interests_currents as $interest) {
            $ids[] = $interest->id;
        }
        $interests_faltantes = Interest::whereNotIn('id', $ids)->get();
        //dd($interests_currents);
        
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
        // dd($comos);
        return view('docente.edit',compact('docente','comos','persona','mododocentes','estados','paises','ciudades','zonas','observacion','interests_currents','interests_faltantes'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocenteUpdateRequest $request,Docente $docente)
    {
        /*DESDE */
        //dd($request->all());
        if(($request->nombrecorto=="")||($request->fecha_inicio=="")||
            ($request->dias_prueba=="")||($request->sueldo=="")||
            ($request->mododocente_id=="")||($request->estado_id=="")||($request->perfil==""))
        {
            return back()->withInput()->with(['mensaje'=>"Faltan llenar datos"]);
        }

        $persona=$docente->persona;
        $persona->nombre = $request->nombre;
        $persona->apellidop = $request->apellidop;
        $persona->apellidom = $request->apellidom;
        $persona->fechanacimiento = $request->fechanacimiento;
        $persona->direccion = $request->direccion;
        $persona->carnet = $request->carnet;
        $persona->expedido = $request->expedido;
        $persona->genero = $request->genero;
        if ($request->hasFile('foto')){
            $foto=$request->file('foto');
            $nombreImagen='estudiantes/'.Str::random(20).'.jpg';
            $imagen= Image::make($foto)->encode('jpg',75);
            $imagen->resize(300,300,function($constraint){
                $constraint->upsize();
            });
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());
            $persona->foto = $nombreImagen;
        }
        $persona->como_id = $request->como_id;
        $persona->habilitado = 1;
        $persona->papelinicial = $request->papel;
        $persona->telefono=$request->telefono;
        $persona->persona_id = $request->persona_id;
        $persona->pais_id = $request->pais_id;
        $persona->ciudad_id = $request->ciudad_id;
        $persona->zona_id = $request->zona_id;
        $persona->save();
        $persona->interests()->sync(array_keys($request->interests));
        /*HASTA*/
        $docente->nombrecorto=$request->nombrecorto;
        $docente->fecha_inicio=$request->fecha_inicio;
        $docente->dias_prueba = $request->dias_prueba;
        $docente->sueldo =$request->sueldo;
        $docente->mododocente_id = $request->mododocente_id;
        $docente->perfil = $request->perfil;
        $docente->estado_id =$request->estado_id;
        $docente->save();
        $docente->usuarios()->attach(Auth::user()->id);

        $observacion = new Observacion();
        $observacion->observacion = $request->observacion;
        $observacion->activo = 1;
        $observacion->observable_id = $persona->id;
        $observacion->observable_type = "App\Models\Persona";
        $observacion->save();
        
        //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A  O B S E R V A C I O N   %%%%%%%%%%%%%%%%*/
        $observacion->usuarios()->attach(Auth::user()->id);

        return redirect()->Route('docentes.show',$docente->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Persona::findOrFail($id)->docente;
        $docente->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }

    public function configurar_niveles($persona){
        $Persona= Persona::findOrFail($persona);
        $idsNivelesDocente=Arr::pluck($Persona->docente->niveles, 'id');
        $nivelesTodos=Arr::pluck(Nivel::select('id')->get(),'id');
        $nivelesFaltantes=collect($nivelesTodos)->diff($idsNivelesDocente);
        $nivelesFaltantes=Nivel::whereIn('id',$nivelesFaltantes)->get();
        $nivelesDocente=Nivel::whereIn('id',$idsNivelesDocente)->get();
        return view('docente.niveles',compact('nivelesDocente','nivelesFaltantes','Persona'));
    }

    public function GuardarConfigurarNiveles(Request $request,$docente) {
        $docente = Persona::findOrFail($docente)->docente;
        $docente->niveles()->sync(array_keys($request->niveles));
        return redirect()->route('docentes.gestionar.niveles',$docente->persona->id);
    } 

    public function turnos($docente)
    {
        $docente = Docente::with('persona')->findOrFail($docente);
        $dias = Dia::orderBy('id')->get();
        $turnos = DocenteTurno::where('docente_id', $docente->id)
            ->orderBy('dia_id')
            ->orderBy('hora_inicio')
            ->get()
            ->groupBy('dia_id');

        return view('docente.turnos', compact('docente', 'dias', 'turnos'));
    }

    public function guardarTurnos(Request $request, $docente)
    {
        $docente = Docente::findOrFail($docente);

        $turnosInput = $request->input('turnos', []);
        $normalizedTurnos = [];

        foreach ($turnosInput as $diaId => $items) {
            foreach ($items as $index => $item) {
                $normalizedTurnos[$diaId][$index] = [
                    'hora_inicio' => isset($item['hora_inicio']) && $item['hora_inicio'] !== '' ? $item['hora_inicio'] : null,
                    'hora_fin' => isset($item['hora_fin']) && $item['hora_fin'] !== '' ? $item['hora_fin'] : null,
                ];
            }
        }

        $request->merge(['turnos' => $normalizedTurnos]);

        $request->validate([
            'turnos.*.*.hora_inicio' => 'nullable|date_format:H:i',
            'turnos.*.*.hora_fin' => 'nullable|date_format:H:i',
        ]);

        $turnosInput = $normalizedTurnos;
        $errors = [];

        foreach ($turnosInput as $diaId => $items) {
            foreach ($items as $index => $item) {
                $inicio = $item['hora_inicio'] ?? null;
                $fin = $item['hora_fin'] ?? null;

                if (!$inicio && !$fin) {
                    continue;
                }

                if (!$inicio || !$fin) {
                    $errors["turnos.$diaId.$index"] = 'Debe completar hora inicio y fin.';
                    continue;
                }

                if ($fin <= $inicio) {
                    $errors["turnos.$diaId.$index"] = 'La hora fin debe ser mayor que hora inicio.';
                }
            }
        }

        if (!empty($errors)) {
            return back()->withErrors($errors)->withInput();
        }

        $removeIds = $request->input('remove_turnos', []);
        if (!empty($removeIds)) {
            DocenteTurno::where('docente_id', $docente->id)
                ->whereIn('id', $removeIds)
                ->delete();
        }

        foreach ($turnosInput as $diaId => $items) {
            foreach ($items as $item) {
                $inicio = $item['hora_inicio'] ?? null;
                $fin = $item['hora_fin'] ?? null;

                if (!$inicio || !$fin || $fin <= $inicio) {
                    continue;
                }

                DocenteTurno::create([
                    'docente_id' => $docente->id,
                    'dia_id' => (int) $diaId,
                    'hora_inicio' => $inicio,
                    'hora_fin' => $fin,
                ]);
            }
        }

        return redirect()->route('docentes.turnos', $docente->id)
            ->with('mensaje', 'Turnos actualizados.');
    }

    public function docentesPorTurno(Request $request)
    {
        $dias = $request->input('dias', '');
        $horaInicio = $request->input('hora_inicio');
        $horaFin = $request->input('hora_fin');
        $modoDocente = strtoupper(trim((string) $request->input('mododocente', '')));

        if ($horaInicio && strlen($horaInicio) === 5) {
            $horaInicio = $horaInicio . ':00';
        }

        if ($horaFin && strlen($horaFin) === 5) {
            $horaFin = $horaFin . ':00';
        }

        $diasList = collect(explode(',', $dias))
            ->map(function ($dia) {
                return (int) trim($dia);
            })
            ->filter(function ($dia) {
                return $dia > 0;
            })
            ->values();

        if ($diasList->isEmpty() || !$horaInicio || !$horaFin) {
            return response()->json([]);
        }

        $docenteIds = DocenteTurno::select('docente_id')
            ->whereIn('dia_id', $diasList)
            ->where('hora_inicio', '<=', $horaInicio)
            ->where('hora_fin', '>=', $horaFin)
            ->groupBy('docente_id')
            ->havingRaw('COUNT(DISTINCT dia_id) = ?', [$diasList->count()])
            ->pluck('docente_id');

        $docentesQuery = Docente::with('persona')
            ->whereIn('id', $docenteIds)
            ->where('estado_id', estado('HABILITADO'));

        if ($modoDocente !== '') {
            $docentesQuery->whereHas('mododocente', function ($query) use ($modoDocente) {
                $query->whereRaw('UPPER(TRIM(mododocente)) LIKE ?', ['%' . $modoDocente . '%']);
            });
        }

        $docentes = $docentesQuery
            ->orderBy('nombrecorto')
            ->get();

        $conteos = DB::table('sesions')
            ->select('docente_id', DB::raw('COUNT(*) as cantidad'))
            ->whereIn('docente_id', $docenteIds)
            ->whereIn('dia_id', $diasList)
            ->where('horainicio', $horaInicio)
            ->where('horafin', $horaFin)
            ->groupBy('docente_id')
            ->pluck('cantidad', 'docente_id');

        $respuesta = $docentes->map(function ($docente) use ($conteos) {
            $persona = $docente->persona;
            $nombre = $persona ? ($persona->nombre . ' ' . $persona->apellidop) : $docente->nombrecorto;
            $cantidad = (int) ($conteos[$docente->id] ?? 0);
            return [
                'id' => $docente->id,
                'nombre' => $nombre,
                'cantidad' => $cantidad,
            ];
        })->values();

        return response()->json($respuesta);
    }

    // Reporte PDF de turnos de docentes habilitados
    public function turnosPdf(Request $request)
    {
        $docentes = Docente::whereHas('persona', function($q) {
            $q->where('estado_id', estado('HABILITADO'));
        })->with(['persona', 'turnos' => function($q) {
            $q->with('dia');
        }])->get();

        if ($request->has('download')) {
            $pdf = PDF::loadView('docente.turnos_pdf_export', ['docentes' => $docentes, 'pdf' => true]);
            return $pdf->download('turnos_docentes.pdf');
        }
        return view('docente.turnos_pdf', compact('docentes'));
    }

   
    public function EstudiantesDeUnDocente($estudiante_id){
        $estudiantes=Docente::findOrFail($estudiante_id)
        ->estudiantes
        ->get();
        
        return datatables()->of($estudiantes)
                ->addColumn('btn', 'docente.action_estudiantes')
                ->rawColumns(['btn', 'foto'])
                ->toJson();
        
    }
    public function listarDocentes(){
        $docentes=Persona::join('docentes','docentes.persona_id','=','personas.id')
        ->join('mododocentes','mododocentes.id','docentes.mododocente_id')
        ->select('docentes.id','personas.id as persona_id','personas.nombre','personas.apellidop','personas.apellidom','foto','docentes.perfil','mododocente','personas.telefono')->get();

        return datatables()->of($docentes)
            ->addColumn('btn','docente.action')
            ->rawColumns(['btn','perfil'])
            ->toJson();    
    }



    public function docentesEstado($estado='HABILITADO'){
        // dd($estado);
        $docenteshabilitados=Docente::where('docentes.estado_id',estado($estado))->select('id','nombrecorto')->get();
        return $docenteshabilitados;
    }
   
    public function misestudiantes() 
    {
        $programacion = Programacion::where('docente_id',Auth::user()->persona->docente->id)->where('fecha',Carbon::now()->format('Y-m-d'))->get();

        return view('persona.misestudiantes',compact("programacion"));
 
    }

    public function estudiantesinscritos() 
    {
        
        $carrera = Carrera::with('computacion')->get();
        
        return view('persona.estudiantesinscritos',compact("carrera"));

    }

}


