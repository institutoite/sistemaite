<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagoStoreRequest;
use App\Models\Inscripcione;
use App\Models\Pago;
use App\Models\User;
use App\Models\Aula;
use App\Models\Dia;
use App\Models\Modalidad;
use App\Models\Persona;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;



/**
 * Class PagoController
 * @package App\Http\Controllers
 */
class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::paginate();

        return view('pago.index', compact('pagos'))
            ->with('i', (request()->input('page', 1) - 1) * $pagos->perPage());
    }
    public function detallar($inscripcion_id)
    {
        //$pagos=Pago::where('pagable_id','=',$inscripcion_id)->get();
        $inscripcion = Inscripcione::findOrFail($inscripcion_id);
        $pagos = $inscripcion->pagos;
        $acuenta = $inscripcion->pagos->sum->monto;
        $saldo = $inscripcion->costo - $acuenta;
        return view('pago.detalle', compact('inscripcion', 'pagos', 'acuenta', 'saldo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pago = new Pago();
        return view('pago.create', compact('pago'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate(Pago::$rules);

        $pago = Pago::create($request->all());
       
        return redirect()->route('pagos.index')
            ->with('success', 'Pago created successfully.');
    }
    public function crear($inscripcion_id)
    {
        $inscripcion=Inscripcione::findOrFail((int)$inscripcion_id);
        $pagos = $inscripcion->pagos;
        $acuenta= $inscripcion->pagos->sum->monto;
        $saldo=$inscripcion->costo-$acuenta;
        return view('pago.create', compact('inscripcion','pagos','acuenta','saldo'));
    }

    public function guardar(PagoStoreRequest $request,$inscripcion_id){
        $inscripcion=Inscripcione::findOrFail($inscripcion_id);
        $pago=new Pago();
        $pago->monto=$request->monto;
        $pago->pagocon=$request->pagocon;
        $pago->cambio=$request->cambio;
        $pago->pagable_id=$inscripcion->id;
        $pago->pagable_type='App\Models\Inscripcione';
        $pago->save();
        //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   %%%%%%%%%%%%%%%%*/
        $pago->usuarios()->attach(Auth::user()->id);
        return redirect()->route('billete.crear',['pago'=>$pago]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pago = Pago::find($id);

        return view('pago.show', compact('pago'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($pago_id)
    {   
        $pago = Pago::find($pago_id);
        $billetes=$pago->billetes;
        //$user=User::find($pago->userable->user_id);
        $user=$pago->usuarios->first();
        $data=['pago'=>$pago,'user'=>$user,'billetes'=>$billetes];

        return response()->json($data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pago::find($id);

        return view('pago.editar', compact('pago'));
    }
    public function editar($pago_id)
    {
        $pago = Pago::find($pago_id);
        $inscripcion=$pago->pagable; 
        return view('pago.edit',compact('pago','inscripcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pago $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        request()->validate(Pago::$rules);
        $pago->update($request->all());
       
        return response()->json($pago); 
    }

    public function actualizar(PagoStoreRequest $request, Pago $pago)
    {
        $pago->update($request->all());
        return redirect()->route('billete.crear', ['pago' => $pago]); 
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($pago_id)
    {
        $pago = Pago::find($pago_id);
        $pago->billetes()->detach();
        $pago->delete();    
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
    public function pagosMostrarAjax(Request $request){
        $inscripcion = Inscripcione::findOrFail($request->inscripcion_id);
        $persona=$inscripcion->estudiante->persona;
        $pagos = $inscripcion->pagos;
        $acuenta = $inscripcion->pagos->sum->monto;
        $saldo = $inscripcion->costo - $acuenta;
        $data=['pagos'=>$pagos, 'persona'=>$persona,'acuenta'=>$acuenta, 'saldo'=>$saldo,'total'=>$inscripcion->costo];
        return response()->json($data);
    }

    public function deudoresInscripcion(){
        // return response()->json(['e'=>2]);
        $deudores =Persona::join('estudiantes','estudiantes.persona_id','personas.id')
            ->join('inscripciones','inscripciones.estudiante_id','estudiantes.id')
            ->join('pagos','pagos.pagable_id','inscripciones.id')
            ->where('pagos.pagable_type',Inscripcione::class)
            ->where('inscripciones.condonado',0)
            ->where('inscripciones.costo','>',DB::raw("(SELECT sum(monto) FROM pagos WHERE pagos.pagable_id= inscripciones.id)"))
            ->select('personas.id','inscripciones.id as inscripcione_id','personas.nombre','personas.apellidop','costo','foto','telefono','fecha_proximo_pago',DB::raw("(SELECT sum(monto) FROM pagos WHERE pagos.pagable_id= inscripciones.id) as acuenta"))
            ->groupBy('personas.id','inscripcione_id','personas.nombre','personas.apellidop','acuenta','foto','telefono','fecha_proximo_pago','costo')
            ->get();
        return DataTables::of($deudores)
                ->addColumn('btn','persona.deudores.action')
                ->rawColumns(['btn'])
                ->toJson();

    } 
    public function deudoresView(){
        return view('persona.deudores.index');
    }

}
