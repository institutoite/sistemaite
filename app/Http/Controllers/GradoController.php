<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\User;
use App\Models\Nivel;
use App\Models\Persona;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\GradoUpdateRequest;
use App\Http\Requests\GradoStoreRequest;
use Illuminate\Validation\Rule;

/**
 * Class GradoController
 * @package App\Http\Controllers
 */
class GradoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Grados')->only('index');
        $this->middleware('can:Crear Grados')->only('create','store');
        $this->middleware('can:Editar Grados')->only('edit','update');
        $this->middleware('can:Eliminar Grados')->only('destroy');
    }
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

    public function gradosAunNoCursados($estudiante_id){
        $estudiante=Estudiante::findOrFail($estudiante_id);
        $grados=Grado::whereNotIn('grado',$estudiante->grados->pluck('grado'))->get();
        return $grados;
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = Nivel::all();
        $grados = Grado::all();
        $colegios = Colegio::all();
        
        return view('grado.create', compact('niveles','grados','colegios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoStoreRequest $request)
    {
        $grado=new Grado();
        $grado->grado=$request->grado;
        $grado->nivel_id=$request->nivel_id;
        $grado->save();
        $grado->usuarios()->attach(Auth::user()->id);
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
        $user = $grado->usuarios->first();
        //return response()->json($user);
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
    public function actualizar(GradoUpdateRequest $request)
    {

        //return response()->json(['e'=>2]);
        //return response()->json(['ok'=>2]);
        $grado = Grado::findOrFail($request->grado_id);
        $validator = Validator::make($request->all(), [
            'grado' => ['required','min:5','max:30',Rule::unique('grados', 'grado')->ignore($grado)],  /* https://laraveles.com/foro/viewtopic.php?id=6764 */
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
    public function destroy(Grado $grado)
    {
        $grado->delete();
        return response()->json(['message' => 'Registro Eliminado correctamente']);
    }
}
