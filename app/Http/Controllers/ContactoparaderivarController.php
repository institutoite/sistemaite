<?php

namespace App\Http\Controllers;

use App\Models\Contactoparaderivar;
use App\Http\Requests\StoreContactoparaderivarRequest;
use App\Http\Requests\UpdateContactoparaderivarRequest;

class ContactoparaderivarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contactoparaderivar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactoparaderivar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactoparaderivarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactoparaderivarRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contactoparaderivar  $contactoparaderivar
     * @return \Illuminate\Http\Response
     */
    public function show(Contactoparaderivar $contactoparaderivar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contactoparaderivar  $contactoparaderivar
     * @return \Illuminate\Http\Response
     */
    public function edit(Contactoparaderivar $contactoparaderivar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactoparaderivarRequest  $request
     * @param  \App\Models\Contactoparaderivar  $contactoparaderivar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactoparaderivarRequest $request, Contactoparaderivar $contactoparaderivar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contactoparaderivar  $contactoparaderivar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactoparaderivar $contactoparaderivar)
    {
        //
    }
}
