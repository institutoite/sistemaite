<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;

use Illuminate\Http\Request;

use App\Models\Billete;
use App\Models\Modalidad;
use App\Models\Pago;
use App\Models\Matriculacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;


class BilletecomController extends Controller
{
    public function __construct(){
        $this->middleware('can:Listar Billetecom')->only('index');
        $this->middleware('can:Crear Billetecom')->only('crear','guardar');
        $this->middleware('can:Graficar Billetecom')->only('billetesMatriculaciones');
    }

    public function index()
    {
        return view('billetecom.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($pago)
    {
        $pago=Pago::findOrFail($pago);
        $matriculacion=$pago->pagable;
        $carrera=$matriculacion->asignatura->carrera;
        $computacion=$matriculacion->computacion;
        $persona=$computacion->persona;
        return view('billetecom.create', compact('computacion','carrera','persona','matriculacion','pago'));
    }

   public function guardar(Request $request,$pago_id)
    {
        $pago = Pago::findOrFail($pago_id);
        $montoBilletes= $request->billete200*200+ $request->billete100*100+ $request->billete50*50+ $request->billete20*20+
        $request->billete10*10+ $request->moneda5*5+ $request->moneda2*2+ $request->moneda1*1+ $request->moneda50*0.5+ $request->moneda20*0.2;
        $cambioBilletes = $request->billetecambio200 * 200 + $request->billetecambio100 * 100 + $request->billetecambio50 * 50 + $request->billetecambio20 * 20 +
        $request->billetecambio10 * 10 + $request->monedacambio5 * 5 + $request->monedacambio2 * 2 + $request->monedacambio1 + $request->monedacambio50 * 0.5 + $request->monedacambio20 * 0.2;
      
        if(($pago->pagocon!=$montoBilletes)||($pago->cambio!=$cambioBilletes)){
            $mensaje="La cantidad de Billetes es incorrecta: ";
            return back()->withInput()->with(['mensaje'=>$mensaje,'pagocon'=>$montoBilletes,'cambio'=>$cambioBilletes]);
        }else{
            $vector_cantidad_billetes=[];
            if($request->billete200 != 0){ $vector_cantidad_billetes['1']= $request->billete200;}
            if($request->billete100 != 0){ $vector_cantidad_billetes['2']= $request->billete100;}
            if($request->billete50  != 0){ $vector_cantidad_billetes['3']= $request->billete50;}
            if($request->billete20  != 0){ $vector_cantidad_billetes['4']= $request->billete20;}
            if($request->billete10  != 0){ $vector_cantidad_billetes['5']= $request->billete10;}
            if($request->moneda5    != 0){ $vector_cantidad_billetes['6']= $request->moneda5;}
            if($request->moneda2    != 0){ $vector_cantidad_billetes['7']= $request->moneda2;}
            if($request->moneda1    != 0){ $vector_cantidad_billetes['8']= $request->moneda1;}
            if($request->moneda50   != 0){ $vector_cantidad_billetes['9']= $request->moneda50;}
            if($request->moneda20   != 0){ $vector_cantidad_billetes['10']= $request->moneda20;}

            $pago->billetes()->detach();
            foreach ($vector_cantidad_billetes as $key => $value) {
                $pago->billetes()->attach($key,['cantidad'=>$value,'tipo'=>'pago']);
            }
            //dd($request->all());
            $vector_cantidad_billetes_cambio=[];
            if($request->billetecambio200 != 0){ $vector_cantidad_billetes_cambio['1']= $request->billetecambio200;}
            if($request->billetecambio100 != 0){ $vector_cantidad_billetes_cambio['2']= $request->billetecambio100;}
            if($request->billetecambio50  != 0){ $vector_cantidad_billetes_cambio['3']= $request->billetecambio50;}
            if($request->billetecambio20  != 0){ $vector_cantidad_billetes_cambio['4']= $request->billetecambio20;}
            if($request->billetecambio10  != 0){ $vector_cantidad_billetes_cambio['5']= $request->billetecambio10;}
            if($request->monedacambio5    != 0){ $vector_cantidad_billetes_cambio['6']= $request->monedacambio5;}
            if($request->monedacambio2    != 0){ $vector_cantidad_billetes_cambio['7']= $request->monedacambio2;}
            if($request->monedacambio1    != 0){ $vector_cantidad_billetes_cambio['8']= $request->monedacambio1;}
            if($request->monedacambio50   != 0){ $vector_cantidad_billetes_cambio['9']= $request->monedacambio50;}
            if($request->monedacambio20   != 0){ $vector_cantidad_billetes_cambio['10']= $request->monedacambio20;}
            

            
            foreach ($vector_cantidad_billetes_cambio as $key => $val) {
                $pago->billetes()->attach($key,['cantidad'=>$val,'tipo'=>'cambio']);
            }
            $matriculacion = Matriculacion::findOrFail($pago->pagable_id);
            
            if($matriculacion->estado_id==estado("RESERVADO")){
                return redirect()->route('matriculacion.configuracion',$matriculacion);
            }else{
                if ($matriculacion->programacionescom->count() == 0) {
                    return redirect()->route('generar.programacioncom', $matriculacion->id);
                } else {
                    
                    return redirect()->route('actualizar.programacioncom.segun.pago', ['matriculacion' => $matriculacion->id, 'pago' => $pago_id]);
                }
            }
        }
    }

    public function billetesMatriculaciones(Request $request){
        $pagos=Pago::join('billetables','billetables.billetable_id','pagos.id')
        ->join('billetes','billetables.billete_id','billetes.id')
        ->where('pagos.pagable_type','App\\Models\\Matriculacion')
        ->whereDate('pagos.created_at','<=',$request->fechafin)
        ->whereDate('pagos.created_at','>=',$request->fechaini)
        ->select('billetes.corte',DB::raw('(cantidad*corte) as subtotal'),DB::raw('sum(cantidad) as cantidad'))
        ->groupBy('corte','cantidad','subtotal')
        ->get();
        return DataTables::of($pagos)
        ->toJson();
    }
}
