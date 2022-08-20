<?php
namespace App\Http\Controllers;
use App\Models\Docente;
use App\Models\Nivel;
use App\Models\Persona;
use App\Models\Pais;
use App\Models\Ciudad;
use App\Models\Estado;
use App\Models\Zona;
use App\Models\Interest;
use App\Models\Observacion;
use App\Models\Mododocente;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //$docente=$persona->docente;
        $ciudades = Ciudad::get();
        $estados = Estado::get();
        $mododocentes = Mododocente::get();


        return view('docente.create',compact('mododocentes','estados','paises', 'zonas', 'ciudades','interests'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //se muestra comoo persona
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona=Persona::findOrFail($id);
        $docente=$persona->docente;
        $ciudades = Ciudad::get();
        $paises = Pais::get();
        $zonas = Zona::get();
        $estados = Estado::get();
        $mododocentes = Mododocente::get();
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
        return view('docente.edit',compact('docente','persona','mododocentes','estados','paises','ciudades','zonas','observacion','interests_currents','interests_faltantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($id);
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

    public function misclases(Request $request){
        $persona_id = $request->id;
        return view('docente.estudiantesactuales',compact('persona_id'));
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

    public function misEstudiatescomActuales(){
      
    }

    public function misEstudiatesProgramados(){

    }
    public function misEstudiatescomProgramados(){

    }

    public function misEsperados() //
    {

    }
    
    public function misEsperadoscom() //
    {

    }


}


