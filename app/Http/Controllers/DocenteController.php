<?php
namespace App\Http\Controllers;
use App\Models\Docente;
use App\Models\Nivel;
use App\Models\Persona;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //se guarda como persona
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
        //se edita como persona
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
        //se actaliza como persona
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

    public function misEstudiatesActuales(){
        $estudiantes=Docente::join('clases','clases.docente_id','docentes.id')->where('estado_id',Config::get('constantes.ESTADO_PRESENTE'))
        ->where('fecha',Carbon::now()->format('Y-m-d'))->get();
        dd($estudiantes);
        
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


