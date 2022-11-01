<?php

namespace App\Http\Controllers;

use App\Models\Periodable;
use App\Models\Docente;
use App\Models\Administrativo;
use App\Models\Pago;
use App\Http\Requests\StorePeriodableRequest;
use App\Http\Requests\UpdatePeriodableRequest;
use App\Http\Requests\PagoStoreRequest;
use App\Http\Requests\DeleteRequest;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Support\Facades\DB;
// use Yajra\DataTables\Contracts\DataTable as DataTable; 
// use Yajra\DataTables\DataTables;

class PeriodableController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Periodos')->only("index","show","listarMisPeriodosView","createPagoView");
        $this->middleware('can:Crear Periodos')->only("create","store","storePago","storePagoAjax");
        $this->middleware('can:Editar Periodos')->only("edit","update","updatePagoAjax");
        $this->middleware('can:Eliminar Periodos')->only("destroy","eliminarPagoPeriodo");
    }
    
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
        //dd($periodable_type);
        switch ($periodable_type) {
            case 'Administrativo':
                $LastPeriodable = Periodable::where("periodable_id",$periodable_id)
                                ->where("periodable_type","App\\Models\\".$periodable_type)
                                ->select("fechafin","fechaini")
                                ->get()->last();
                //dd($LastPeriodable);
                if(is_null($LastPeriodable)){
                    $fechaini=Carbon::now()->subMonth();;
                    $fechafin=Carbon::now();
                }else{
                    $fechaini=$LastPeriodable->fechaini;
                    $fechafin=$LastPeriodable->fechafin;
                }
                $persona=Administrativo::findOrFail($periodable_id)->persona;
                break;
            case 'Docente':
                $LastPeriodable = Periodable::where("periodable_id",$periodable_id)
                                ->where("periodable_type","App\\Models\\".$periodable_type)
                                ->select("fechafin","fechaini")
                                ->get()->last();
                //dd($LastPeriodable);
                if((is_null($LastPeriodable))){
                    $fechaini=Carbon::now()->subMonth();
                    $fechafin=Carbon::now();
                }else{
                    $fechaini=$LastPeriodable->fechaini;
                    $fechafin=$LastPeriodable->fechafin;
                }
                $persona=Docente::findOrFail($periodable_id)->persona;
                break;
            default:
                break;
        }
        
        $fechafin->addMonth();
        $fechaini->addMonth();
        //dd($fechaini);
        return view("periodable.create",compact('periodable_id','persona','LastPeriodable','periodable_type','fechaini','fechafin'));
        
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
        // return redirect()->route("periodable.index");
        return redirect()->route("periodos.periodable.view",["periodable_id"=>$request->periodable_id,"periodable_type"=>$request->periodable_type]);
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
                ->select('periodables.id','periodables.periodable_id','personas.nombre','personas.apellidop','periodables.fechaini','periodables.fechafin','periodables.periodable_type','pagado')
                ->get();
        return datatables()->of($periodables)
        ->addColumn('btn', 'periodable.actionadministrativos')
        ->rawColumns(['btn'])
        ->toJson();
    }
    public function listarDocentes(){
        $periodables=Periodable::join('docentes','docentes.id','periodables.periodable_id')
            ->join('personas','personas.id','docentes.persona_id')
            ->where('periodable_type',"App\\Models\\Docente")
            ->select('periodables.id','periodables.periodable_id','personas.nombre','personas.apellidop','periodables.fechaini','periodables.fechafin','periodables.periodable_type','pagado')
            ->get();
        return datatables()->of($periodables)
        ->addColumn('btn', 'periodable.actiondocentes')
        ->rawColumns(['btn'])
        ->toJson();
    }
    public function listarMisPeriodosView($periodable_id, $periodable_type){
        
        return view("periodable.periodos",compact('periodable_id','periodable_type'));
    }
    public function createPagoView($periodable_id){
        //dd($periodable_id);
        $periodable=Periodable::findOrFail($periodable_id);
        $pagos = $periodable->pagos;
        $acuenta= $periodable->pagos->sum->monto;
        $saldo=$periodable->periodable->sueldo-$acuenta;
        $periodable_type=TipoPeriodableCorto($periodable->periodable_type);
        $persona=$periodable->periodable->persona;
        return view("periodable.pago.crearpago",compact('periodable','persona','periodable_type','pagos','acuenta','saldo'));
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
        $acuenta= $periodable->periodable->pagos->sum->monto;
        if($periodable->periodable_type == Docente::class){
            $saldo=$periodable->periodable->sueldo-$acuenta;
        }else{
            $saldo=$periodable->periodable->sueldo-$acuenta;
        }
        return view('periodable.pago.crearpago', compact('periodable','pagos','acuenta','saldo'));
    }
    public function storePagoAjax(DeleteRequest $request){
        //return response()->json($request->all());
        $validator = Validator::make($request->all(), [
            'monto'=> 'required|numeric|min:0',
            'pagocon'=> 'required|numeric|min:0',
            'cambio'=>'required|numeric|min:0',
            'periodable_id'=>'required|numeric|min:0',
        ]);
        if ($validator->passes()) {
            $pago=new Pago();
            $pago->monto=$request->monto;
            $pago->pagocon=$request->pagocon;
            $pago->cambio=$request->cambio;
            $pago->pagable_id=$request->periodable_id;
            $pago->pagable_type="App\\Models\\Periodable";// en realidad no se requiere pagable_type
            $pago->save();
            $pago->usuarios()->attach(Auth::user()->id);

            $periodable=Periodable::findOrFail($request->periodable_id);
            $pagos = $periodable->pagos;
            $acuenta= $periodable->pagos->sum->monto;
            if($periodable->periodable_type == Docente::class){
                $saldo=$periodable->periodable->sueldo-$acuenta;
            }else{
                $saldo=$periodable->periodable->sueldo-$acuenta;
            }
            if($saldo<=0)
            $periodable->pagado=1;
            $periodable->save();
            $periodable_type=TipoPeriodableCorto($periodable->periodable_type);
            $persona=$periodable->periodable->persona;
            $total=$periodable->periodable->sueldo;
            $data=['periodable'=>$periodable,'pagos'=>$pagos,'periodable_type'=>$periodable_type,'persona'=>$persona,'acuenta'=>$acuenta,'saldo'=>$saldo,'total'=>$total];
            return response()->json($data);
        }
        else{
            return response()->json(['errores' => $validator->errors()]);
        }
    }
    public function updatePagoAjax(DeleteRequest $request){
        //return response()->json($request->all());
        $validator = Validator::make($request->all(), [
            'monto'=> 'required|numeric|min:0',
            'pagocon'=> 'required|numeric|min:0',
            'cambio'=>'required|numeric|min:0',
            'pago_id'=>'required|numeric|min:0',
        ]);
        if ($validator->passes()) {
            $pago=Pago::findOrFail($request->pago_id);
            $pago->monto=$request->monto;
            $pago->pagocon=$request->pagocon;
            $pago->cambio=$request->cambio;
            $pago->save();
            $periodable=Periodable::find($pago->pagable->periodable_id);
            $periodable_type=$periodable->periodable_type;
            $persona=$periodable->periodable->persona;
            $pagos=$periodable->pagos;
            $acuenta= $periodable->pagos->sum->monto;
            $saldo=$periodable->periodable->sueldo-$acuenta;
            $total=$periodable->periodable->sueldo;
            $data=['periodable'=>$periodable,'pagos'=>$pagos,'periodable_type'=>$periodable_type,'persona'=>$persona,'acuenta'=>$acuenta,'saldo'=>$saldo,'total'=>$total];
            return response()->json($data);
        }
        else{
            return response()->json(['errores' => $validator->errors()]);
        }
    }

    public function eliminarPagoPeriodo(Pago $pago){
        $periodable=Periodable::find($pago->pagable->periodable_id);
        $periodable_type=$periodable->periodable_type;
        $persona=$periodable->periodable->persona;
        $pago->billetes()->detach();
        $pago->delete(); 
        $pagos=$periodable->pagos;
        $acuenta= $periodable->pagos->sum->monto;
        $saldo=$periodable->periodable->sueldo-$acuenta;
        $total=$periodable->periodable->sueldo;
        $data=['periodable'=>$periodable,'pagos'=>$pagos,'periodable_type'=>$periodable_type,'persona'=>$persona,'acuenta'=>$acuenta,'saldo'=>$saldo,'total'=>$total];
        return response()->json($data);   
    }
    public function listarPagosAjax($periodable_id){
        //$periodable_id=1;
        $periodable=Periodable::findOrFail($periodable_id);
        //return response()->json($periodable);
        if($periodable->periodable_type == "App\\Models\\Docente")
            $pagos = Pago::join('periodables','periodables.id','pagos.pagable_id')
                ->join('userables','userables.userable_id','=','pagos.id')
                ->join('users','users.id','=','userables.user_id')
                ->where('userable_type','App\\Models\\Pago')
                ->where('pagos.pagable_id',$periodable_id)
                ->where('pagos.pagable_type','App\\Models\\Periodable')
                ->select('pagos.id','pagos.monto','name','pagos.created_at')
                ->get();
        //return $pagos;
        if($periodable->periodable_type == "App\\Models\\Administrativo")
             $pagos = Pago::join('periodables','periodables.id','pagos.pagable_id')
                    ->join('userables','userables.userable_id','=','pagos.id')
                    ->join('users','users.id','=','userables.user_id')
                    ->where('userable_type','App\\Models\\Pago')
                    ->where('pagos.pagable_id',$periodable_id)
                    ->where('pagos.pagable_type','App\\Models\\Periodable')
                    ->select('pagos.id','pagos.monto','name','pagos.created_at')
                    ->get();

        return datatables()->of($pagos)
        ->addColumn('btn', 'periodable.pago.actionpagos')
        ->rawColumns(['btn'])
        ->toJson();
    }

}
            

