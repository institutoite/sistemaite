<?php

namespace App\Http\Controllers;

use App\Models\Contactoparaderivar;
use App\Http\Requests\StoreContactoparaderivarRequest;
use App\Http\Requests\UpdateContactoparaderivarRequest;

class ContactoparaderivarController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Contactoparaderivar')->only('index');
        $this->middleware('can:Crear Contactoparaderivar')->only('create');
    }
    
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
}
