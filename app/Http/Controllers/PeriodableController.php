<?php

namespace App\Http\Controllers;

use App\Models\Periodable;
use App\Http\Requests\StorePeriodableRequest;
use App\Http\Requests\UpdatePeriodableRequest;

class PeriodableController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriodableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function show(Periodable $periodable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodable $periodable)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodable  $periodable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodable $periodable)
    {
        //
    }
}
