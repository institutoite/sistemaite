<?php

namespace App\Http\Controllers;

use App\Models\Homequestion;
use Illuminate\Http\Request;

class HomeQuestionController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:Crear Preguntas')->only('create','store');
        $this->middleware('can:Editar Preguntas')->only('edit','update');
        $this->middleware('can:Eliminar Preguntas')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Homequestion::all();

        return view('home.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Homequestion::create($request->all());
        return redirect()->route('homequestion.index');
    }

    public function destroy($id)
    {
        $homequestion = homequestion::find($id);
        $homequestion->delete();
        return redirect()->route('homequestion.index');
    }
}
