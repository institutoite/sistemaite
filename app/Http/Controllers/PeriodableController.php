<?php

namespace App\Http\Controllers;

use App\Models\Periodable;
use App\Models\Pago;
use App\Http\Requests\StorePeriodableRequest;
use App\Http\Requests\UpdatePeriodableRequest;
use App\Http\Requests\PagoStoreRequest;
use App\Http\Requests\DeleteRequest;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\DB;
// use Yajra\DataTables\Contracts\DataTable as DataTable; 
// use Yajra\DataTables\DataTables;

class PeriodableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('periodable.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($periodable_id,$periodable_type)
    {
        switch ($periodable_type) {
            case 'Administrativo':
                $periodable = Periodable::where("periodable_id",$periodable_id)
                                ->where("periodable_type",$periodable_type)
                                ->select("fechafin","fechaini")
                                ->get()->last();
                if((is_null($periodable))){
                    $fechaini=Carbon::now();
                    $fechafin=Carbon::now();
                }else{
                    $fechaini=$periodable->fechaini;
                    $fechafin=$periodable->fechafin;
                }
                
                break;
            
            case 'Docente':
                $periodable = Periodable::where("periodable_id",$periodable_id)
                                ->where("periodable_type",$periodable_type)
                                ->select("fechafin","fechaini")
                                ->get()->last();
                if((is_null($periodable))){
                    $fechaini=Carbon::now();
                    $fechafin=Carbon::now();
                }else{
                    $fechaini=$periodable->fechaini;
                    $fechafin=$periodable->fechafin;
                }
                // dd($periodable);
                break;
                
            default:
                
                break;
        }
        
        $fechafin->addMonth();
        $fechaini->addMonth();
        //dd($fechafin);
        return view("periodable.create",compact('periodable_id', 'periodable_type','fechaini','fechafin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriodableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodableRequest $request)
    {
        $periodable=new Periodable();
        $periodable->periodable_type = "App\\Models\\".$request->periodable_type;
        $periodable->periodable_id = $request->periodable_id;
        $periodable->fechaini = $request->fechaini;
        $periodable->fechafin = $request->fechafin;
        $periodable->pagado=0;
        $periodable->save();
        return redirect()->route("periodable.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function show(Periodable $periodable)
    {
        //$periodable=Periodable::join('')
        $periodable_type_cadena = $periodable->periodable_type;

        $caracter   = '\\';
        $Periodable=$periodable->periodable;
        $pos= strripos($periodable_type_cadena, $caracter);
        $lon=strlen($periodable_type_cadena);
        $periodable_type=substr($periodable_type_cadena,$pos+1,$lon-$pos);
        $periodo=$periodable;
        $persona=$Periodable->persona;
        return view("periodable.show",compact("periodo",'periodable_type','Periodable','persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodable $periodable)
    {
        //dd($periodable);
        return view("periodable.edit",compact("periodable"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodableRequest  $request
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodableRequest $request, Periodable $periodable)
    {
        $periodable->fechaini = $request->fechaini;
        $periodable->fechafin = $request->fechafin;
        $periodable->save();
        return redirect()->route("periodable.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request)
    {
        $periodable_id=$request->id;
        $periodable=Periodable::findOrFail($periodable_id);
        $periodable->delete();
        return response()->json(['mensaje'=>"El registro fue eliminado correctamente"]);
    }
    public function listarAdministrativos(){
        $periodables=Periodable::join('administrativos','administrativos.id','periodables.periodable_id')
                ->join('personas','personas.id','administrativos.persona_id')
                ->where('periodable_type',"App\\Models\\Administrativo")
                ->select('periodables.id','personas.nombre','personas.apellidop','periodables.fechaini','periodables.fechafin','periodables.periodable_type','pagado')
                ->get();
        return datatables()->of($periodables)
        ->addColumn('btn', 'periodable.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
    public function listarDocentes(){
        $periodables=Periodable::join('docentes','docentes.id','periodables.periodable_id')
            ->join('personas','personas.id','docentes.persona_id')
            ->where('periodable_type',"App\\Models\\Docente")
            ->select('periodables.id','personas.nombre','personas.apellidop','periodables.fechaini','periodables.fechafin','periodables.periodable_type','pagado')
            ->get();
        return datatables()->of($periodables)
        ->addColumn('btn', 'periodable.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
    public function listarMisPeriodosView($periodable_id, $periodable_type){
        return view("periodable.periodos",compact('periodable_id','periodable_type'));
    }
    public function createPagoView($periodable_id){
        $periodable=Periodable::findOrFail($periodable_id);
        $pagos = $periodable->periodable->pagos;
        $acuenta= $periodable->periodable->pagos->sum->monto;
        $saldo=$periodable->periodable->sueldo-$acuenta;
        return view("periodable.pago.crearpago",compact('periodable','pagos','acuenta','saldo'));
    }
    public function listarMisPeriodos($periodable_id, $periodable_type){
        if($periodable_type == 'Administrativo')
            $periodables=Periodable::join('administrativos','administrativos.id','periodables.periodable_id')
                ->join('personas','personas.id','administrativos.persona_id')
            ->where('periodable_type',"App\\Models\\".$periodable_type)
            ->where('periodable_id',$periodable_id)
            ->select('periodables.id','personas.nombre','personas.apellidop','periodables.fechaini','periodables.fechafin','periodables.periodable_type','pagado')
            ->get();
            
        if($periodable_type == 'Docente')
            $periodables=Periodable::join('docentes','docentes.id','periodables.periodable_id')
            ->join('personas','personas.id','docentes.persona_id')
            ->where('periodable_type',"App\\Models\\".$periodable_type)
            ->where('periodable_id',$periodable_id)
            ->select('periodables.id','personas.nombre','personas.apellidop','periodables.fechaini','periodables.fechafin','periodables.periodable_type','pagado')
            ->get();
        return datatables()->of($periodables)
        ->addColumn('btn', 'periodable.actionmisperiodos')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function storePago(PagoStoreRequest $request, Periodable $periodable){
        $pago=new Pago();
        $pago->monto=$request->monto;
        $pago->pagocon=$request->pagocon;
        $pago->cambio=$request->cambio;
        $pago->pagable_id=$periodable->id;
        $pago->pagable_type=$periodable->periodable_type;
        $pago->save();
        $pago->usuarios()->attach(Auth::user()->id);
        
        $pagos = $periodable->periodable->pagos;

        ->join('userables','userables.userable_id','=','pagos.id')
  ->join('users','users.id','=','userables.user_id')
  ->where('userable_type','App\\Models\\Pago')

        $acuenta= $periodable->periodable->pagos->sum->monto;
        if($periodable->periodable_type == Docente::class){
            $saldo=$periodable->periodable->sueldo-$acuenta;
        }else{
            $saldo=$periodable->periodable->sueldo-$acuenta;
        }
        return view('periodable.pago.crearpago', compact('periodable', 'pagos','acuenta','saldo'));
    }
    public function listarPagosAjax(){
       $pagos=Pago::all();
        return datatables()->of($pagos)
        ->addColumn('btn', 'periodable.actionmisperiodos')
        ->rawColumns(['btn'])
        ->toJson();
    }

}
            

