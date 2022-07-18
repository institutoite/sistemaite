<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aula;
use App\Models\Userable;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aula::create(['aula'=>'Aula1','direccion'=>'Tres pasos al frente esquina che Guevara primara planta']);
        Aula::create(['aula' => 'Aula2', 'direccion' => 'Tres pasos al frente esquina che Guevara primara planta']);
        Aula::create(['aula' => 'Aula3', 'direccion' => 'Tres pasos al frente esquina che Guevara primara planta']);
        Aula::create(['aula' => 'Aula4', 'direccion' => 'Tres pasos al frente esquina che Guevara primara planta']);
        Aula::create(['aula' => 'Aula5', 'direccion' => 'Sucursal calle 16 planta baja']);
        Aula::create(['aula' => 'Aula6', 'direccion' => 'Sucursal calle 16 planta baja']);
        Aula::create(['aula' => 'Aula7', 'direccion' => 'Sucursal calle 16 planta baja']);
        Aula::create(['aula' => 'Aula8', 'direccion' => 'Sucursal calle 16 planta baja']);
        Aula::create(['aula' => 'Aula9', 'direccion' => 'Sucursal calle 16 planta baja']);
        Aula::create(['aula' => 'Aula10', 'direccion' => 'Sucursal calle 16 planta baja']); 

        Userable::create(["user_id"=>1,"userable_id"=>1,"userable_type"=>"App\Models\Aula"]);
        Userable::create(["user_id"=>1,"userable_id"=>2,"userable_type"=>"App\Models\Aula"]);
        Userable::create(["user_id"=>1,"userable_id"=>3,"userable_type"=>"App\Models\Aula"]);
        Userable::create(["user_id"=>1,"userable_id"=>4,"userable_type"=>"App\Models\Aula"]);
        
        Userable::create(["user_id"=>1,"userable_id"=>5,"userable_type"=>"App\Models\Aula"]);
        Userable::create(["user_id"=>1,"userable_id"=>6,"userable_type"=>"App\Models\Aula"]);
        Userable::create(["user_id"=>1,"userable_id"=>7,"userable_type"=>"App\Models\Aula"]);
        Userable::create(["user_id"=>1,"userable_id"=>8,"userable_type"=>"App\Models\Aula"]);
        
        Userable::create(["user_id"=>1,"userable_id"=>9,"userable_type"=>"App\Models\Aula"]);
        Userable::create(["user_id"=>1,"userable_id"=>10,"userable_type"=>"App\Models\Aula"]);


    }
}
