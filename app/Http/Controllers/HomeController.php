<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Feriado;
use App\Models\Homequestion;
use App\Models\Homeschedule;
use App\Models\Hometext;
use App\Models\Modalidad;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hometext = Hometext::get()->last();
        $homeschedules = Homeschedule::all();
        $guarderias = Modalidad::all()->where('nivel_id', '1');
        $inicials = Modalidad::all()->where('nivel_id', '2');
        $primarias = Modalidad::all()->where('nivel_id', '3');
        $secundarias = Modalidad::all()->where('nivel_id', '4');
        $preuniversitarios = Modalidad::all()->where('nivel_id', '5');
        $institutos = Modalidad::all()->where('nivel_id', '6');
        $universitarios = Modalidad::all()->where('nivel_id', '7');
        $profesionals = Modalidad::all()->where('nivel_id', '8');
        $feriados = Feriado::all();
        $docentes = Docente::all()->where('estado','activo');
        
        return view('home.index', compact(['hometext', 'homeschedules', 'guarderias', 'inicials', 'primarias', 'secundarias', 'preuniversitarios', 'institutos', 'universitarios', 'profesionals', 'feriados', 'docentes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.text.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hometext::create($request->all());
        return redirect()->route('home.create');
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

    public function about()
    {
        return view('home.about');
    }


    public function questions()
    {
        $questions = Homequestion::all();
        return view('home.questions', compact('questions'));
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
