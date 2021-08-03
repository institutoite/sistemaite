<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\User;
use App\Models\Nivel;
use App\Models\Userable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
/**
 * Class GradoController
 * @package App\Http\Controllers
 */
class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grados = Grado::paginate();

        return view('grado.index', compact('grados'))
            ->with('i', (request()->input('page', 1) - 1) * $grados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = Nivel::all();
        return view('grado.create', compact('niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate(Grado::$rules);
        $grado=new Grado();
        $grado->grado=$request->grado;
        $grado->nivel_id=$request->nivel_id;
        $grado->save();
        
        
        $user = Auth::user();
        $userable = new Userable();
        $userable->user_id = $user->id;
        $userable->userable_id = $grado->id;
        $userable->userable_type = Grado::class;
        $userable->save();
        
        return redirect()->route('grados.index')
            ->with('success', 'Grado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Request $request)
    {
        $grado = Grado::findOrFail($request->id);
        $user = User::findOrFail($grado->userable->user_id);
        $nivel=Nivel::findOrFail($grado->nivel_id);
        $data = ['grado' => $grado, 'user' => $user,'nivel'=>$nivel];
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
        $grado = Grado::find($request->id);
        $niveles=Nivel::get();
        $data = ['grado' => $grado, 'niveles' => $niveles];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Grado $grado
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {

        //return response()->json(['ok'=>2]);
        $validator = Validator::make($request->all(), [
            'grado' => ['required','min:5','max:30','unique:grados,grado,'.$request->grado_id],  /* https://laraveles.com/foro/viewtopic.php?id=6764 */
            'nivel_id' => ['required'], 
        ]);
        //return response()->json($validator->passes());
        
        if ($validator->passes()) {
            $grado = Grado::findOrFail($request->grado_id);
            $grado->grado = $request->grado;
            $grado->nivel_id = $request->nivel_id;
            $grado->save();
            return response()->json(['grado' => $grado]);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $grado = Grado::find($id)->delete();
        return redirect()->route('grados.index')
            ->with('success', 'Grado deleted successfully');
    }
}
