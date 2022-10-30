<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Yajra\DataTables\Contracts\DataTable as DataTable; 
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;

class EventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Eventos')->only("index","show");
        $this->middleware('can:Crear Eventos')->only("create","store");
        $this->middleware('can:Editar Eventos')->only("edit","update","seleccionarEvento");
        $this->middleware('can:Eliminar Eventos')->only("destroy");
    }

    public function index()
    {
        return view('evento.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('evento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventoRequest $request)
    {
        $evento = new Evento();
        $evento->evento = $request->evento;
        $evento->seleccionado =1;
        $evento->save();

        //Evento::where('seleccionado')
        $this->seleccionarEvento($evento->id);
        $evento->usuarios()->attach(Auth::user()->id);
        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        $user=$evento->usuarios->first();
        return view('evento.show',compact('evento','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view("evento.edit",compact("evento"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventoRequest  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        $evento->evento=$request->evento;
        $evento->save();
        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return response()->json(["mensaje"=>"Registro eliminado correctamente"]);
    }

    public function listar(){
        return datatables()->of(Evento::get())
        ->addColumn('btn', 'evento.action')
        ->rawColumns(['btn'])
        ->toJson();
    }
    public function seleccionarEvento($evento_id){
        $eventos = Evento::all();
        foreach ($eventos as $evento) {
            if($evento->id!=$evento_id){
                $evento->seleccionado=0;
                $evento->save();
        }else{
            $evento->seleccionado=1;
            $evento->save();
        }
    }
        return response()->json(['mensaje' =>"Evento seleccionado correctamente"]);
    }
    
}
