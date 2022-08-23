<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Felicitado;
use App\Models\Inscripcione;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
class EstudianteController extends Controller
{

    public function cumplenerosView()
    {
        return view('estudiantes.cumpleaneros');
    }
    public function historia($estudiante_id)
    {
        $grados=Estudiante::join('estudiante_grado','estudiantes.id','=','estudiante_grado.estudiante_id')
            ->join('grados','grados.id','=','estudiante_grado.grado_id')
            ->join('colegios','colegios.id','=','estudiante_grado.colegio_id')
            ->select('estudiantes.id','colegio_id','colegios.nombre','grados.grado','anio')
            ->orderBy('anio', 'desc')
            ->get();
        return view('estudiantes.historiaacademica',compact('grados','estudiante_id'));
    }
    public function cumpleaneros(Request $request){
        $cumpleaneros=Persona::join('estudiantes','estudiantes.persona_id','personas.id')
  			->whereMonth('fechanacimiento', '=', Carbon::now()->add($request->dias, 'day')->format('m'))
                ->whereDay('fechanacimiento', '=', Carbon::now()->add($request->dias, 'day')->format('d'))
                ->whereNotIn('personas.id',Felicitado::where('anio',Carbon::now()->year)->select('persona_id')->get()->toArray())
  			->select('personas.id','nombre','apellidop','apellidom','foto','telefono',DB::raw("(SELECT TIMESTAMPDIFF(YEAR,fechanacimiento,CURDATE()) AS viejo FROM personas where personas.id=estudiantes.persona_id GROUP BY nombre,fechanacimiento) as edad"))
                ->groupBy('personas.id','nombre','fechanacimiento','apellidop','apellidom','foto','telefono','edad')
                ->get();
        return DataTables::of($cumpleaneros)
            ->addColumn('btn','estudiantes.action')
            ->rawColumns(['btn'])
            ->toJson(); 
    }

    public function estudiantesFaltones()
    {
        $faltones=Persona::join('estudiantes','personas.id','estudiantes.persona_id')
                ->join('inscripciones','inscripciones.estudiante_id','estudiantes.id')
                ->join('programacions','programacions.inscripcione_id','inscripciones.id')
                ->join('estados','estados.id','programacions.estado_id')
                ->join('userables','userables.userable_id','inscripciones.id')
                ->join('users','users.id','userables.user_id')
                ->where('userables.userable_type',Inscripcione::class)
                ->where('estados.estado','FALTA')
                ->select('personas.id','programacions.id as programacion_id','nombre','apellidop','apellidom','telefono','users.name','personas.foto')
                ->get();
        return DataTables::of($faltones)
        ->addColumn('btn','estudiantes.actionfaltones')
        ->rawColumns(['btn'])
        ->toJson(); 
    }

    
    public function faltonesView()
    {
        return view('estudiantes.faltones');
    }
    public function store(Request $request)
    {

    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    

    
}
