<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Calificacion extends Component
{
    public $calificableid; 
    public $calificabletype;
    public $promedio;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($calificableid="valor por defecto", $calificabletype="Type por defecto", $promedio="radio por defecto")
    {
        $this->calificableid=$calificableid;
        $this->calificabletype=$calificabletype;
        $this->promedio=$promedio;
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
