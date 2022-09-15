<?php

namespace App\Http\Controllers;

use App\Models\Periodable;
use App\Http\Requests\StorePeriodableRequest;
use App\Http\Requests\UpdatePeriodableRequest;
use App\Http\Requests\DeleteRequest;
use Carbon\Carbon;

class PeriodableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('periodable.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($periodable_id,$periodable_type)
    {
        switch ($periodable_type) {
            case 'Administrativo':
                $periodable = Periodable::where("periodable_id",$periodable_id)
                                ->where("periodable_type",$periodable_type)
                                ->select("fechafin","fechaini")
                                ->get()->last();
                if((is_null($periodable))){
                    $fechaini=Carbon::now();
                    $fechafin=Carbon::now();
                }else{
                    $fechaini=$periodable->fechaini;
                    $fechafin=$periodable->fechafin;
                }
                
                break;
            
            case 'Docente':
                $periodable = Periodable::where("periodable_id",$periodable_id)
                                ->where("periodable_type",$periodable_type)
                                ->select("fechafin","fechaini")
                                ->get()->last();
                if((is_null($periodable))){
                    $fechaini=Carbon::now();
                    $fechafin=Carbon::now();
                }else{
                    $fechaini=$periodable->fechaini;
                    $fechafin=$periodable->fechafin;
                }
                // dd($periodable);
                break;
                
            default:
                
                break;
        }
        
        $fechafin->addMonth();
        $fechaini->addMonth();
        //dd($fechafin);
        return view("periodable.create",compact('periodable_id', 'periodable_type','fechaini','fechafin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriodableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodableRequest $request)
    {
        $periodable=new Periodable();
        $periodable->periodable_type = "App\\Modals\\".$request->periodable_type;
        $periodable->periodable_id = $request->periodable_id;
        $periodable->fechaini = $request->fechaini;
        $periodable->fechafin = $request->fechafin;
        $periodable->pagado=0;
        $periodable->save();
        return redirect()->route("periodable.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function show(Periodable $periodable)
    {
        dd($periodable);
        return view("periodable.show",compact("periodable"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodable $periodable)
    {
        //dd($periodable);
        return view("periodable.edit",compact("periodable"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodableRequest  $request
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodableRequest $request, Periodable $periodable)
    {
        $periodable->fechaini = $request->fechaini;
        $periodable->fechafin = $request->fechafin;
        $periodable->save();
        return redirect()->route("periodable.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request)
    {
        $periodable_id=$request->id;
        $periodable=Periodable::findOrFail($periodable_id);
        $periodable->delete();
        return response()->json(['mensaje'=>"El registro fue eliminado correctamente"]);
    }
    public function listarAdministrativos(){
        $periodables=Periodable::join('administrativos','administrativos.id','periodables.periodable_id')
                ->join('personas','personas.id','administrativos.persona_id')
                ->join()
                ->select('periodables.id','personas.nombre','personas.apellidop','periodables.fechaini','periodables.fechafin','periodables.periodable_type','pagado')
                ->get();
        return datatables()->of($periodables)
        ->addColumn('btn', 'periodable.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
    public function listarDocentes(){
        $periodables=Periodable::join('docentes','docentes.id','periodables.periodable_id')
                ->join('personas','personas.id','docentes.persona_id')
                ->select('periodables.id','personas.nombre','personas.apellidop','periodables.fechaini','periodables.fechafin','periodables.periodable_type','pagado')
                ->get();
        return datatables()->of($periodables)
        ->addColumn('btn', 'periodable.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
