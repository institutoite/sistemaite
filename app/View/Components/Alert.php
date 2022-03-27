<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $color;
    public $calificable;
    public $calificableid;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color="danger",$calificable="Persona",$calificableid=2)
    {
        $this->color = $color;
        $this->calificable = $calificable;
        $this->calificableid = $calificableid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
