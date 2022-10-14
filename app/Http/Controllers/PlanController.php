<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Convenio;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;

use Yajra\DataTables\Contracts\DataTable as DataTable;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $convenios=Convenio::all();
        return view('plan.create',compact('convenios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request)
    {
        $plan= new Plan();
        $plan->titulo=$request->titulo;
        $plan->descripcion=$request->descripcion;
        $plan->costo=$request->costo;
        $plan->convenio_id=$request->convenio_id;
        if ($request->hasFile('foto')){
            $foto=$request->file('foto');
            $nombreImagen='planes/'.str_replace(' ','',$request->titulo).'.jpg';
            $imagen= Image::make($foto)->encode('jpg',90);
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());
            $plan->foto = $nombreImagen;
        }
        $plan->save();
        return redirect()->route('plan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanRequest  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        $convenio->titulo=$request->titulo;
        $convenio->descripcion=$request->descripcion;
        
        if ($request->hasFile('foto')){
            if (Storage::disk('public')->exists($convenio->foto)) {
                Storage::disk('public')->delete($convenio->foto);
            }
            $foto=$request->file('foto');
            $nombreImagen='convenios/'.str_replace(' ','',$request->titulo).'.jpg';
            $imagen= Image::make($foto)->encode('jpg',90);
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());
            $convenio->foto = $nombreImagen;
        }
        $convenio->save();
        return redirect()->route('convenio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
    public function listar(){
        $planes = Plan::join('convenios','plans.convenio_id','convenios.id')
                ->select('plans.id','plans.titulo','plans.descripcion','plans.foto','plans.costo','convenios.titulo as convenio')
                ->get();
        return datatables()->of($planes)
        ->addColumn('btn', 'plan.action')
        ->rawColumns(['btn','descripcion'])
        ->toJson();
    }
}
