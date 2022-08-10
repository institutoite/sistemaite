<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Createobservation extends Component
{
    public $id;
    public $nombre;
    public $observabletype;
    public $btnguardar;
    public $btnlabel;
    public $titulo;
    public $modo;
    public $idmodalformulario;
    public function __construct($id,$nombre,$observabletype,$btnguardar,$btnlabel,$titulo,$modo,$idmodalformulario)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->observabletype = $observabletype;
        $this->btnguardar = $btnguardar;
        $this->btnlabel = $btnlabel;
        $this->titulo = $titulo;
        $this->modo = $modo;
        $this->idmodalformulario = $idmodalformulario;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.createobservation');
    }
}
