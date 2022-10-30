<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Inscripcione;
//use Illuminate\Support\Facades\Request;

class ChartController extends Controller
{

     public function __construct()
    {
        $this->middleware('can:Graficar Informes')->only([
            "chartCantidadInscripcionesXModaalidades",
            "charCantidadRecaudadoXModalidades",
            "charCantidadInscripcionesxUsuario",
            "charFractalesRecaudadosxUser",
            "charCantidadPagosxUser",
            "charCantidadLicenciasxMotivos",
        ]);
        
    }

    public function chartCantidadInscripcionesXModaalidades(Request $request){
        $consulta = Inscripcione::join('modalidads','inscripciones.modalidad_id','modalidads.id')
        ->select('modalidad',DB::raw('count(*) as cantidad'))
        ->groupBy('modalidad')
        ->orderBy('cantidad', 'desc')
        ->get();
        $data['label'][]=[];
        $data['data'][]=[];
        foreach ($consulta as $elemento) {
            $data['label'][]=$elemento->modalidad;
            $data['data'][]=$elemento->cantidad;
        }
        $data['data']=json_encode($data);
        
        if($request->ajax()){
            return datatables()->of($consulta)
                ->toJson();
        }else{
            return view('chart.inscripciones.pormodalidades',$data);
        }
    }
    public function charCantidadRecaudadoXModalidades(Request $request){
        $consulta = Inscripcione::join('modalidads','inscripciones.modalidad_id','modalidads.id')
        ->join('pagos','pagos.pagable_id','inscripciones.id')
        ->where('pagos.pagable_type','App\\Models\\Inscripcione')
        ->select('modalidad',DB::raw('sum(monto) as monto'))
        ->groupBy('modalidad')
        ->orderBy('monto', 'desc')
        ->get();
        $data['label'][]=[];
        $data['data'][]=[];
        foreach ($consulta as $elemento) {
            $data['label'][]=$elemento->modalidad;
            $data['data'][]=$elemento->monto;
        }
        $data['data']=json_encode($data);
        
        if($request->ajax()){
            return datatables()->of($consulta)
                ->toJson();
        }else{
            return view('chart.inscripciones.fractalesxmodalidad',$data);
        }
    }
    public function charCantidadInscripcionesxUsuario(Request $request){
        $consulta= Inscripcione::join('userables','userables.userable_id','inscripciones.id')
            ->join('users','users.id','userables.user_id')
            ->where('userables.userable_type', "App\\Models\\Inscripcione")
            ->select('users.name',DB::raw('count(*) as cantidad'))
            ->groupBy('name')
            ->orderBy('cantidad', 'desc')
            ->get();
        
        $data['label'][]=[];
        $data['data'][]=[];
        foreach ($consulta as $elemento) {
            $data['label'][]=$elemento->name;
            $data['data'][]=$elemento->cantidad;
        }
        $data['data']=json_encode($data);
        
        if($request->ajax()){
            return datatables()->of($consulta)
                ->toJson();
        }else{
            return view('chart.inscripciones.cantidadinscripcionesxuser',$data);
        }
    }
    public function charFractalesRecaudadosxUser(Request $request){
        $consulta= Inscripcione::join('pagos','pagos.pagable_id','inscripciones.id')
            ->join('userables','userables.userable_id','pagos.id')
            ->join('users','users.id','userables.user_id')
            ->where('userables.userable_type', "App\\Models\\Pago")
            ->where('pagos.pagable_type', "App\\Models\\Inscripcione")
            ->select('users.name',DB::raw('sum(monto) as monto'))
            ->groupBy('name')
            ->orderBy('monto','desc')
            ->get();
        $data['label'][]=[];
        $data['data'][]=[];
        foreach ($consulta as $elemento) {
            $data['label'][]=$elemento->name;
            $data['data'][]=$elemento->monto;
        }
        $data['data']=json_encode($data);
        
        if($request->ajax()){
            return datatables()->of($consulta)
                ->toJson();
        }else{
            return view('chart.pagos.fractalesrecaudadosxuser',$data);
        }
    }
    public function charCantidadPagosxUser(Request $request){
        $consulta= Inscripcione::join('pagos','pagos.pagable_id','inscripciones.id')
            ->join('userables','userables.userable_id','pagos.id')
            ->join('users','users.id','userables.user_id')
            ->where('userables.userable_type', "App\\Models\\Pago")
            ->where('pagos.pagable_type', "App\\Models\\Inscripcione")
            ->select('users.name',DB::raw('count(*) as cantidad'))
            ->groupBy('name')
            ->orderBy('cantidad','desc')
            ->get();
        $data['label'][]=[];
        $data['data'][]=[];
        foreach ($consulta as $elemento) {
            $data['label'][]=$elemento->name;
            $data['data'][]=$elemento->cantidad;
        }
        $data['data']=json_encode($data);
        
        if($request->ajax()){
            return datatables()->of($consulta)
                ->toJson();
        }else{
            return view('chart.pagos.cantidadpagosxuser',$data);
        }
    }

    // FALTA DARLE FUNCIONALIDAD LA CONSULTA ESTA PERFECTA
    public function charCantidadLicenciasxMotivos(Request $request){
        $consulta=Licencia::join('motivos','licencias.motivo_id','motivos.id')
            ->select('motivo',DB::raw('count(*) as cantidad'))
            ->groupBy('motivo')
            ->orderBy('cantidad','desc')
            ->get();
        
        $data['label'][]=[];
        $data['data'][]=[];
        foreach ($consulta as $elemento) {
            $data['label'][]=$elemento->name;
            $data['data'][]=$elemento->cantidad;
        }
        $data['data']=json_encode($data);
        
        if($request->ajax()){
            return datatables()->of($consulta)
                ->toJson();
        }else{
            return view('chart.pagos.cantidadpagosxuser',$data);
        }
    }


}