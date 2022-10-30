<?php

namespace App\Http\Controllers;

use App\Models\Mensajeado;
use App\Models\Evento;
use App\Http\Requests\StoreMensajeadoRequest;
use App\Http\Requests\UpdateMensajeadoRequest;
use App\Http\Controllers\EventoController;
use App\Http\Requests\MensajeableStoreRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class MensajeadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Mensajeados')->only("getMensajeadosView");
        $this->middleware('can:Crear Mensajeados')->only("storeMensajeado");
    }
    public function storeMensajeado(StoreMensajeadoRequest $request){
        $eventoObjeto = new EventoController();
        $evento = eventoSeleccionado();
        $mensajeado= new Mensajeado();
        $mensajeado->persona_id = $request->persona_id;
        $mensajeado->evento_id= $evento->id;
        $mensajeado->save();
        return response()->json(['mensaje'=>"Mensajeado guardo Correctamente"]);
    }
    
    public function getMensajeados($unEvento){
        
        $mensajeados=Mensajeado::join('personas','mensajeados.persona_id','personas.id')
            ->join('eventos','eventos.id','mensajeados.evento_id')
            ->where('eventos.id',$unEvento)
            ->select('personas.id','nombre','apellidop','apellidom','foto','vuelvefecha','volvera')
            ->get();
        return DataTables::of($mensajeados)
                ->addColumn('btn','mensaje.masivo.actionmensajeados')
                ->rawColumns(['btn'])
                ->toJson();
    }

    public function getMensajeadosView(Evento $evento){
        // dd($evento);
        return view("mensaje.masivo.mensajeados",compact('evento'));
    }
}
