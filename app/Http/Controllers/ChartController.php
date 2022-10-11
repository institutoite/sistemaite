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
        ->groupBy('modalidad')->get();
        //->pluck('modalidad', 'cantidad');
        foreach ($consulta as $elemento) {
            $data['label'][]=$elemento->modalidad;
            $data['data'][]=$elemento->cantidad;
        }
        $data['data']=json_encode($data);
        return view('chart.inscripciones.pormodalidades',$data);
    }
}