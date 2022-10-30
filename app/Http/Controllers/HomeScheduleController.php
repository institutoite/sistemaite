<?php

namespace App\Http\Controllers;

use App\Models\Homeschedule;
use Illuminate\Http\Request;

class HomeScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Crear Horarios')->only('create','store');
        $this->middleware('can:Editar Horarios')->only('edit','update');
        $this->middleware('can:Eliminar Horarios')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Homeschedule::all();

        return view('home.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Homeschedule::create($request->all());
        return redirect()->route('homeschedule.index');
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
    public function edit($homeschedule)
    {
        
        $homeschedule= homeschedule::findOrFail($homeschedule);
        return view('home.schedule.edit', compact('homeschedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homeschedule $schedule)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $schedule->update($request->all());

        
        return redirect()->route('homeschedule.index');
    }

    public function destroy($id)
    {
        $homeschedule = homeschedule::find($id);
        $homeschedule->delete();
        return redirect()->route('homeschedule.index');
    }
}
