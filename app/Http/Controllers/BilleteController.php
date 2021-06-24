<?php

namespace App\Http\Controllers;

use App\Models\Inscripcione;
use App\Models\Billete;
use App\Models\Pago;
use Illuminate\Http\Request;

/**
 * Class BilleteController
 * @package App\Http\Controllers
 */
class BilleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billetes = Billete::paginate();

        return view('billete.index', compact('billetes'))
            ->with('i', (request()->input('page', 1) - 1) * $billetes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tipo='pago';
        return view('billete.create', compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        request()->validate(Billete::$rules);

        

        $billete = Billete::create($request->all());

        return redirect()->route('billetes.index')
            ->with('success', 'Billete created successfully.');
    }

    public function guardar(Request $request,$pago_id)
    {
        dd($request->all());
        $monto= $request->billete200*200+ $request->billete100*100+ $request->billete50*50+ $request->billete20*20+
                $request->billete10*10+ $request->moneda5*5+ $request->moneda*2+ $request->moneda*1+ $request->moneda50*0.5+ $request->moneda*0.2;
                

        $vector_cantidad_billetes=[];
        if($request->billete200!=null){
            $vector_cantidad_billetes['1']= $request->billete200;
        }
        if ($request->billete100 != null) {
            $vector_cantidad_billetes['2']= $request->billete100;
        }
        if ($request->billete50 != null) {
            $vector_cantidad_billetes['3']= $request->billete50;
        }
        if ($request->billete20 != null) {
            $vector_cantidad_billetes['4']= $request->billete20;
        }
        if ($request->billete10 != null) {
            $vector_cantidad_billetes['5']= $request->billete10;
        }
        if ($request->moneda5 != null) {
            $vector_cantidad_billetes['6'] = $request->moneda5;
        }
        if ($request->moneda2 != null) {
            $vector_cantidad_billetes['7'] = $request->moneda2;
        }
        if ($request->moneda1 != null) {
            $vector_cantidad_billetes['8'] = $request->moneda1;
        }
        if ($request->moneda50 != null) {
            $vector_cantidad_billetes['9'] = $request->moneda50;
        }
        if ($request->moneda20 != null) {
            $vector_cantidad_billetes['10'] = $request->moneda20;
        }
        $pago=Pago::findOrFail($pago_id);
        foreach ($vector_cantidad_billetes as $key => $value) {
            $pago->billetes()->attach($key,['cantidad'=>$vector_cantidad_billetes[$key],'tipo'=>'pago']);
        }

        $pago = Pago::findOrFail($pago_id);
        $inscripcion = Inscripcione::findOrFail($pago->pagable_id);
        if ($inscripcion->pagos->count() == 1) {
            return redirect()->route('generar.programa', $inscripcion->id);
        } else {
            return redirect()->route('actualizar.programa.segun.pago', ['inscripcione' => $inscripcion->id, 'pago' => $pago_id]);
        }
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billete = Billete::find($id);

        return view('billete.show', compact('billete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billete = Billete::find($id);

        return view('billete.edit', compact('billete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Billete $billete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billete $billete)
    {
        request()->validate(Billete::$rules);

        $billete->update($request->all());

        return redirect()->route('billetes.index')
            ->with('success', 'Billete updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $billete = Billete::find($id)->delete();

        return redirect()->route('billetes.index')
            ->with('success', 'Billete deleted successfully');
    }
}


/**
 *   $billete=new Billete();

        $billete->billete200=$request->billete200;
        $billete->billete100=$request->billete100;
        $billete->billete50=$request->billete50;
        $billete->billete20=$request->billete20;
        $billete->billete10=$request->billete10;
        $billete->moneda5 = $request->moneda5;
        $billete->moneda2 = $request->moneda2;
        $billete->moneda1 = $request->moneda1;
        $billete->moneda50 = $request->moneda50;
        $billete->moneda20 = $request->moneda20;
        $billete->moneda10 = $request->moneda10;
        $billete->pago_id=$pago_id;
        $billete->tipo='pago';
        $billete->save();

        $billete_cambio = new Billete();
        $billete_cambio->billete200 = $request->billetecambio200;
        $billete_cambio->billete100 = $request->billetecambio100;
        $billete_cambio->billete50 = $request->billetecambio50;
        $billete_cambio->billete20 = $request->billetecambio20;
        $billete_cambio->billete10 = $request->billetecambio10;
        $billete_cambio->moneda5 = $request->monedacambio5;
        $billete_cambio->moneda2 = $request->monedacambio2;
        $billete_cambio->moneda1 = $request->monedacambio1;
        $billete_cambio->moneda50 = $request->monedacambio50;
        $billete_cambio->moneda20 = $request->monedacambio20;
        $billete_cambio->moneda10 = $request->monedacambio10;
        $billete_cambio->pago_id = $pago_id;
        $billete_cambio->tipo = 'cambio';
        $billete_cambio->save();

        $pago=Pago::findOrFail($pago_id);
        $inscripcion=Inscripcione::findOrFail($pago->pagable_id);
        if($inscripcion->pagos->count()==1){
            return redirect()->route('generar.programa', $inscripcion->id);
        }else{
            return redirect()->route('actualizar.programa.segun.pago', ['inscripcione'=>$inscripcion->id,'pago'=>$pago_id]);
        }

 */