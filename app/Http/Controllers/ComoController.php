<?php

namespace App\Http\Controllers;

use App\Models\Como;
use App\Http\Requests\StoreComoRequest;
use App\Http\Requests\UpdateComoRequest;

class ComoController extends Controller
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
     * @param  \App\Http\Requests\StoreComoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Como  $como
     * @return \Illuminate\Http\Response
     */
    public function show(Como $como)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Como  $como
     * @return \Illuminate\Http\Response
     */
    public function edit(Como $como)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComoRequest  $request
     * @param  \App\Models\Como  $como
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComoRequest $request, Como $como)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Como  $como
     * @return \Illuminate\Http\Response
     */
    public function destroy(Como $como)
    {
        //
    }
}
