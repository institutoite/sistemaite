<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Inscripcione;


class ChartController extends Controller
{
    public function chartCantidadInscripcionesXModaalidades(){
        $consulta = Inscripcione::join('modalidads','inscripciones.modalidad_id','modalidads.id')
        ->select('modalidad',DB::raw('count(*) as cantidad'))
        ->groupBy('modalidad')
        ->pluck('modalidad', 'cantidad');
        $labels = $consulta->keys();
        $data = $consulta->values();
        //dd($data);
        return view('chart.inscripciones.pormodalidades',compact('labels', 'data'));
    }
}
