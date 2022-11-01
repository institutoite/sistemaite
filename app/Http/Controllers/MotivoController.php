<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotivoStoreRequest;
use App\Http\Requests\MotivoUpdateRequest;
use App\Models\Motivo;
use App\Models\User;
use App\Models\Tipomotivo;
//use Dotenv\Validator as Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Validator;
use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\Rule;




/**
 * Class MotivoController
 * @package App\Http\Controllers
 */
class MotivoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Motivos')->only('index','show','mostrar');
        $this->middleware('can:Crear Motivos')->only('create','store');
        $this->middleware('can:Editar Motivos')->only('edit','update','actualizar','destroy');
        $this->middleware('can:Eliminar Motivos')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motivos = Motivo::paginate();

        return view('motivo.index', compact('motivos'))
            ->with('i', (request()->input('page', 1) - 1) * $motivos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motivo = new Motivo();
        $tipomotivos=Tipomotivo::all();
        return view('motivo.create', compact('motivo','tipomotivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotivoStoreRequest $request)
    {
        //request()->validate(Motivo::$rules);
        $motivo=new Motivo();
        $motivo->motivo=$request->motivo;
        $motivo->tipomotivo_id=$request->tipomotivo_id;
        $motivo->save();
        $user = Auth::user();
        $motivo->usuarios()->attach(Auth::user()->id);
        return redirect()->route('motivos.index')
            ->with('success', 'Motivo Guardado Correctamente.');
    }
    public function guardar(MotivoStoreRequest $request)
    {
        request()->validate(Motivo::$rules);
        $motivo = Motivo::create($request->all());
        return redirect()->route('motivos.index')
            ->with('success', 'Motivo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motivo = Motivo::find($id);
        $user=User::findOrFail($motivo->userable->user_id);
        return view('motivo.show', compact('motivo','user'));
    }
    public function mostrar(Request $request)
    {
        $motivo = Motivo::findOrFail($request->id);
        $user = $motivo->usuarios->first();
        $tipomotivo=$motivo->tipomotivo;
        $data=['motivo'=>$motivo,'user'=>$user ,'tipomotivo'=>$tipomotivo];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function editar(Request $request)
    {
        $motivo = Motivo::find($request->id);
        $tipomotivos=Tipomotivo::all();
        $data=['motivo'=>$motivo,'tipomotivos'=>$tipomotivos];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Motivo $motivo
     * @return \Illuminate\Http\Response
     */
      //%%%%%%%%%%%%%%%%%%%%%%%%%%%  u p d a t e %%%%%%%%%%%%%%%%%%%
    public function actualizar(Request $request)
    {

        $motivo = Motivo::findOrFail($request->id);
        $validator = Validator::make($request->all(), [
            'motivo'=>['required','max:80',Rule::unique('motivos', 'motivo')->ignore($motivo)],
            'tipomotivo_id'=>'required',
        ]);
        
        if ($validator->passes()) {
            $motivo = Motivo::findOrFail($request->id);
            $motivo->motivo = $request->motivo;
            $motivo->tipomotivo_id = $request->tipomotivo_id;
            $motivo->save();
            return response()->json(['motivo'=>$motivo]);
        }else{
            return response()->json(['error' => $validator->errors()->first()]);
        }
    }

    /* 
       
    */

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $motivo = Motivo::find($id)->delete();
        return response()->json(['mensaje'=>"Se elimino correctamente"]);
    }

    public function listar(){
        $motivos=Motivo::join('tipomotivos','motivos.tipomotivo_id','=','tipomotivos.id')
                ->select('motivos.id','motivos.motivo','tipomotivos.tipomotivo');
        return datatables()->of($motivos)
        ->addColumn('btn', 'motivo.action')
        ->rawColumns(['btn'])
        ->toJson();
    }

}
