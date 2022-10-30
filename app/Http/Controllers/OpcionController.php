<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use Carbon\Carbon;

use App\Http\Controllers\GradoController;
use App\Models\Persona;

class OpcionController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Opciones Index')->only("index");
        $this->middleware('can:Opciones Docentes')->only("docentes");
        $this->middleware('can:Opciones Computacion')->only("computacion");
        $this->middleware('can:Opciones Administrativos')->only("administrativos");
    }
    
    public function index($estudiante_id)
    {
        $estudiante=Estudiante::findOrFail($estudiante_id);
        if(!is_null($estudiante->grados()->first())){ 
            $anioUltimo = $estudiante->grados()->orderBy('anio', 'desc')->get()->first()->pivot->anio;
        }
        $colegios=Colegio::all();
        $objetoGrado = new GradoController();
        $grados = $objetoGrado->gradosAunNoCursados($estudiante_id);
        $colegios=Colegio::all();
        $gestiones = Estudiante::join('estudiante_grado', 'estudiantes.id', '=', 'estudiante_grado.estudiante_id')
        ->join('grados', 'grados.id', '=', 'estudiante_grado.grado_id')
        ->join('colegios', 'colegios.id', '=', 'estudiante_grado.colegio_id')
        ->where('estudiante_id','=',$estudiante_id)
        ->select('estudiante_grado.id', 'colegio_id', 'colegios.nombre', 'grados.grado', 'anio')
        ->orderBy('anio', 'desc')
        ->get();
        
        if (empty($anioUltimo)) {
            return redirect()->route('gestion.create',$estudiante_id);
        } else {
            if ($anioUltimo != Carbon::now()->isoFormat('Y')) {
                //dd("Empty: " . $estudiante_id);
                return redirect()->route('gestion.index',$estudiante_id);
            } else {
                
                $persona = $estudiante->persona;
                $grados = $estudiante->grados;
                return view('opcion.principal', compact('persona','grados','estudiante'));
            }
        }
    }

    public function docentes($persona){
        $persona=Persona::findOrFail($persona);
        return view('opcion.principal', compact('persona'));
    }
    public function computacion($persona){
        $persona=Persona::findOrFail($persona);
        return view('opcion.menu_computacion', compact('persona'));
    }
    public function administrativos($persona){
        $persona=Persona::findOrFail($persona);
        return view('opcion.principal', compact('persona'));
    }

}
