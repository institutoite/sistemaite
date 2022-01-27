<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use App\Models\Programacioncom;
use App\Models\Programacion;
use App\Models\Tipomotivo;
use Illuminate\Http\Request;

/**
 * Class LicenciaController
 * @package App\Http\Controllers
 */
class LicenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licencias = Licencia::paginate();
        return view('licencia.index', compact('licencias'))
            ->with('i', (request()->input('page', 1) - 1) * $licencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createcom(Request $request)
    {
        $motivos=Tipomotivo::findOrFail(2)->motivos;    
        $programacioncom=Programacioncom::findOrFail($request->id);
        $data=['motivos'=>$motivos, 'programacioncom'=>$programacioncom];
        return response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createprogramacion(Request $request)
    {
        $motivos=Tipomotivo::findOrFail(2)->motivos;    
        $programacion=Programacion::findOrFail($request->id);
        $data=['motivos'=>$motivos, 'programacion'=>$programacion];
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storecom(Request $request)
    {
        $licenciacom    =new Licencia();
        $licenciacom->motivo_id=$request->motivo_id;
        $licenciacom->solicitante=$request->solicitante;  
        $licenciacom->parentesco=$request->parentesco;  
        $licenciacom->licenciable_id=$request->programacioncom_id;
        $licenciacom->licenciable_type=Programacioncom::class;
        $licenciacom->save();

        $programacioncom=Programacioncom::findOrFail($request->programacioncom_id);
        $programacioncom->estado='LICENCIA';
        $programacioncom->save();

        $data=['mensaje'=>'Licencia guardado correctamente'];
        return response()->json($data);
    }
    public function storeprogramacion(Request $request)
    {
        $licenciacom    =new Licencia();
        $licenciacom->motivo_id=$request->motivo_id;
        $licenciacom->solicitante=$request->solicitante;  
        $licenciacom->parentesco=$request->parentesco;  
        $licenciacom->licenciable_id=$request->programacion_id;
        $licenciacom->licenciable_type=Programacion::class;
        $licenciacom->save();

        $programacion=Programacion::findOrFail($request->programacion_id);
        $programacion->estado='LICENCIA';
        $programacion->save();

        $data=['mensaje'=>'Licencia guardado correctamente'];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $licencia = Licencia::find($id);
        return view('licencia.show', compact('licencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $licencia = Licencia::find($id);
        return view('licencia.edit', compact('licencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Licencia $licencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Licencia $licencia)
    {
        request()->validate(Licencia::$rules);

        $licencia->update($request->all());

        return redirect()->route('licencias.index')
            ->with('success', 'Licencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $licencia = Licencia::find($id)->delete();

        return redirect()->route('licencias.index')
            ->with('success', 'Licencia deleted successfully');
    }
}
