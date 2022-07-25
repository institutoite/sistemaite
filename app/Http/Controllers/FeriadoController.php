<?php
namespace App\Http\Controllers;
use App\Models\Feriado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\FeriadoStoreRequest;
use App\Http\Requests\FeriadoUpdateRequest;
/**
 * Class FeriadoController
 * @package App\Http\Controllers
 */
class FeriadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Feriados')->only('index');
        $this->middleware('can:Crear Feriados')->only('create','store');
        $this->middleware('can:Editar Feriados')->only('edit','update');
        $this->middleware('can:Eliminar Feriados')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('feriado.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feriado = new Feriado();
        return view('feriado.create', compact('feriado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeriadoStoreRequest $request)
    {
        //request()->validate(Feriado::$rules);

        $feriado = new Feriado();
        $feriado->fecha =$request->fecha;
        $feriado->festividad=$request->festividad;
        $feriado->vigente=1;
        $feriado->save();

        $feriado->usuario()->attach(Auth::user()->id);
        return redirect()->route('feriados.index')
            ->with('success', 'Feriado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feriado = Feriado::find($id);
        $user=$feriado->usuario->first();
        return view('feriado.show', compact('feriado','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $feriado = Feriado::findOrFail($id);

        return view('feriado.edit', compact('feriado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Feriado $feriado
     * @return \Illuminate\Http\Response
     */
    public function update(FeriadoUpdateRequest $request, Feriado $feriado)
    {
        //request()->validate(Feriado::$rules);

        $feriado->update($request->all());

        return redirect()->route('feriados.index')
            ->with('success', 'Feriado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        Feriado::findOrFail($id)->delete();
        return response()->json(['mensaje'=>"Se elimino correctamente"]);
    }
}
