<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Carrera;


class CarreraComponet extends Component
{
    use WithPagination;
    public $view ="create";
    public $carrera;
    public $carrera_id;
    public $mensaje;

    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.carrera.carrera-componet',[
            'carreras'=>Carrera::orderBy('id','desc')->paginate(13)
        ]);
    }

    public function store(){
        $this->validate(['carrera'=>'required']);
        $Newcarrera=new Carrera();
        $Newcarrera->carrera=$this->carrera;
        $Newcarrera->save();

    }
    
    
    public function editar($id){
        $Carrera=Carrera::findOrFail($id);
        $this->carrera=$Carrera->carrera;
        $this->carrera_id=$id;
        $this->view='editar';
    }

    public function update(){
        $this->validate(['carrera'=>'required']);

        $Carrera=Carrera::findOrFail($this->carrera_id);
        $Carrera->carrera=$this->carrera;
        $Carrera->save();

        $this->default();
    }


    public function default(){
        $this->carrera='';
        $this->view='create';
    }



    public function delete($id){
        Carrera::destroy($id);
    }
}
