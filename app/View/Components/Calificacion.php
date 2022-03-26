<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Calificacion extends Component
{
    public $calificable_id; 
    public $calificable_type;
    public $promedio;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($calificable_id, $calificable_type, $promedio)
    {
        $this->calificable_id = $calificable_id;
        $this->calificable_type = $calificable_type;
        $this->promedio = $promedio;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.calificacion');
    }
}
