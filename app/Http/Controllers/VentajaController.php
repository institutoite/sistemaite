<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\Ventaja;
use Illuminate\Http\Request;

class VentajaController extends Controller
{
    public function __construct()
    {
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventajas = Ventaja::all();

        return view('ventaja.index', compact('ventajas'));
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ventaja = new Ventaja();
        $interests = Interest::all();
        return view('ventaja.create', compact('ventaja','interests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ventaja=new Ventaja();
        $ventaja->descripcion=$request->descripcion;
        $ventaja->interest_id=$request->interest_id;
        $ventaja->save();
        return redirect()->route('ventaja.index')
            ->with('success', 'Ventaja Guardado Correctamente.');
    }

    public function destroy($id)
    {
        $ventaja = Ventaja::find($id)->delete();
        return redirect()->route('ventaja.index');
    }

}