<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matriculacion;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;

class PagocomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($matriculacion_id)
    {
        
        $matriculacion=Matriculacion::findOrFail($matriculacion_id);
        $pagoscom = $matriculacion->pagos;
        $acuenta= $matriculacion->pagos->sum->monto;
        $saldo=$matriculacion->costo-$acuenta;
        
        return view('pagocom.create', compact('matriculacion','pagoscom','acuenta','saldo'));
    }

   public function guardar(Request $request,$matriculacion_id){

        //dd($matriculacion_id);
        $matriculacion=Matriculacion::findOrFail($matriculacion_id);
        $pago=new Pago();
        $pago->monto=$request->monto;
        $pago->pagocon=$request->pagocon;
        $pago->cambio=$request->cambio;
        $pago->pagable_id=$matriculacion_id;
        $pago->pagable_type=Matriculacion::class;
        $pago->save();
        //**%%%%%%%%%%%%%%%%%%%%  B  I  T  A  C  O  R  A   %%%%%%%%%%%%%%%%*/
        
        $pago->userable()->create(['user_id' => Auth::user()->id]); 
        return redirect()->route('billetecom.crear',['pago'=>$pago]);
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
