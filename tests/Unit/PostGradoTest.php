<?php

namespace Tests\Unit;

//use Tests\TestCase;
use App\Models\Grado;
use Illuminate\Databases\Eloquent\Collection;
use PHPUnit\Framework\TestCase;

class PostGradoTest extends TestCase
{
    public function test_guardar_gestion(){
        //1.- given =>teniendo_
        $estudiante=new Grado;
        //2.- when cuando 
        $this->assertInstanceOf(Collection::class,$estudiante->grados);
        //3.- then entonces 
    }
}
