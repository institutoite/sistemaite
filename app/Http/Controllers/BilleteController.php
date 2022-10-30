<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;

use App\Models\Inscripcione;
use App\Models\Billete;
use App\Models\Modalidad;
use App\Models\Pago;
use App\Models\Nivel;
use App\Models\Aula;
use App\Models\Dia;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;

/**
 * Class BilleteController
 * @package App\Http\Controllers
 */
class BilleteController extends Controller
{

    public function __construct(){
        $this->middleware('can:Listar Billete')->only('index','show');
        $this->middleware('can:Crear Billete')->only('create','crear','guardar','store');
        $this->middleware('can:Editar Billete')->only('edit','update');
        $this->middleware('can:Graficar Billete')->only('billetesInscripciones');
        $this->middleware('can:Eliminar Billete')->only('destroy');
    }

    public function index()
    {
        return view('billete.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tipo='pago';
        return view('billete.create', compact('tipo'));
    }
    public function crear($pago)
    {
        $pago=Pago::findOrFail($pago);
        //dd("ya llegue aqui");
        return view('billete.create', compact('pago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Billete::$rules);
        $billete = Billete::create($request->all());
        return redirect()->route('billetes.index')
            ->with('success', 'Billete created successfully.');
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
            return back()->withInput()->with(['mensaje'=>$mensaje,'monto'=>$montoBilletes,'cambio'=>$cambioBilletes]);
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
            $inscripcion = Inscripcione::findOrFail($pago->pagable_id);
            
            if($inscripcion->estado_id==estado("RESERVADO")){
                //dd("ESTADO INDEFINIDO");
                return redirect()->route('inscripcion.configuracion',$inscripcion);
            }else{
                if ($inscripcion->programaciones->count() == 0) {
                    $nivel=Modalidad::findOrFail($inscripcion->modalidad_id)->nivel->nivel;
                    if($nivel=="GUARDERIA"){
                        // dd("guarderia");
                        return redirect()->route('generar.programa.guarderia', $inscripcion->id);
                    }else {
                        // dd("FALSO DE guarderia");
                        return redirect()->route('generar.programa', $inscripcion->id);
                    }
                } else {
                    // dd("FALSO DE cripcion->programaciones->count()");
                    return redirect()->route('actualizar.programa.segun.pago', ['inscripcione' => $inscripcion->id, 'pago' => $pago_id]);
                }
            }
        }
       
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billete = Billete::find($id);

        return view('billete.show', compact('billete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billete = Billete::find($id);

        return view('billete.edit', compact('billete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Billete $billete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billete $billete)
    {
        request()->validate(Billete::$rules);

        $billete->update($request->all());

        return redirect()->route('billetes.index')
            ->with('success', 'Billete updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $billete = Billete::find($id)->delete();

        return redirect()->route('billetes.index')
            ->with('success', 'Billete deleted successfully');
    }
    public function billetesInscripciones(Request $request){
        $pagos=Pago::join('billetables','billetables.billetable_id','pagos.id')
        ->join('billetes','billetables.billete_id','billetes.id')
        ->where('pagos.pagable_type','App\\Models\\Inscripcione')
        ->whereDate('pagos.created_at','<=',$request->fechafin)
        ->whereDate('pagos.created_at','>=',$request->fechaini)
        ->select('billetes.corte',DB::raw('(cantidad*corte) as subtotal'),DB::raw('sum(cantidad) as cantidad'))
        ->groupBy('corte','cantidad','subtotal')
        ->get();
        // $pagos=Pago::all();
        return DataTables::of($pagos)
        ->toJson();
    }
}



