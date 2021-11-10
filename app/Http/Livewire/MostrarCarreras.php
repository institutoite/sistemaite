<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Carrera;

class MostrarCarreras extends Component
{
    public function render()
    {
        $carreras=Carrera::all();
        return view('livewire.carreer.mostrar-carreras',['carreras'=>$carreras]);
        
    }
}
