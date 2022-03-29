<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Calificacion extends Component
{
    public $color;
    public $personaid;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color="danger",$personaid=2)
    {
        $this->color = $color;
        $this->personaid = $personaid;
        // dd($personaid);
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
