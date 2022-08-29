<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MensajeableStoreRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class MensajeableController extends Controller
{
    
     public function storeMensajeable(MensajeableStoreRequest $request){

        DB::table('mensajeables')->insert(
            array(
                'mensaje_id' => $request->mensaje_id,
                'mensajeable_id' => $request->mensajeable_id,
                'mensajeable_type' => "App\Models\\".$request->mensajeable_type,
                'persona_id' => $request->persona_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            )
        );        
        return response()->json(['mensaje' =>"Se guardo correctamente mensajeable"]);
    }


    public function actualizarEstado(){

        switch ($mensajeable_type) {
            case 'Inscripcione':
                # code...
                break;
            case 'Matriculacion':
                # code...
                break;
                # code...
                break;
            default:
                # code...
                break;
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
