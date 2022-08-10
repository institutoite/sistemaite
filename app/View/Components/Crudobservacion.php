<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Crudobservacion extends Component
{
    public $titulo;
    public $header;
    public $idmodal;
    public function __construct($titulo, $header,$idmodal)
    {
        $this->titulo = $titulo;
        $this->header = $header;
        $this->idmodal = $idmodal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.crudobservacion');
    }
}
