<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PadreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        if (!Auth::user()->hasRole(['Padre'])) {
            abort(403);
        }

        $persona = Auth::user()->persona;
        $hijos = collect();

        if ($persona) {
            $hijos = $persona->hijos()->with(['estudiante.inscripciones', 'computacion.matriculaciones'])->get();

            if ($hijos->isEmpty() && ($persona->estudiante || $persona->computacion)) {
                $hijos = collect([$persona]);
            }
        }

        return view('padre.home', compact('persona', 'hijos'));
    }
}