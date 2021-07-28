<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotivoStoreRequest;
use App\Models\Motivo;
use App\Models\User;
use App\Models\Userable;
//use Dotenv\Validator as Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Validator;
use Illuminate\Support\Facades\Validator;
/**
 * Class MotivoController
 * @package App\Http\Controllers
 */
class MotivoController extends Controller
{
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
        return view('motivo.create', compact('motivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Motivo::$rules);
        $motivo = Motivo::create($request->all());
        
        $user = Auth::user();
        //dd($user);
        $userable = new Userable();
        $userable->user_id = $user->id;
        $userable->userable_id = $motivo->id;
        $userable->userable_type = Motivo::class;
        $userable->save();

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
        
        return view('motivo.show', compact('motivo'));
    }
    public function mostrar(Request $request)
    {
        $motivo = Motivo::findOrFail($request->id);
        $user = User::findOrFail($motivo->userable->user_id);

        $data=['motivo'=>$motivo,'user'=>$user];
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
        return response()->json($motivo);
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
        $validator = Validator::make($request->all(), [
            'motivo' => 'required|min:5|max:50|unique:motivos',
        ]);
        if ($validator->passes()) {
            $motivo = Motivo::findOrFail($request->id);
            $motivo->motivo = $request->motivo;
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

        return response()->json(['mensaje'=>"Se elimino correctamente",'motivo'=>$motivo]);
    }
}
