<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Userable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function show($id)
    {
        $grado = Grado::find($id);

        return view('grado.show', compact('grado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grado = Grado::find($id);

        return view('grado.edit', compact('grado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Grado $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grado $grado)
    {
        request()->validate(Grado::$rules);

        $grado->update($request->all());

        return redirect()->route('grados.index')
            ->with('success', 'Grado updated successfully');
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
