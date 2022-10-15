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

        Aula::find(1)->usuarios()->attach(1);
        Aula::find(2)->usuarios()->attach(1);
        Aula::find(3)->usuarios()->attach(1);
        Aula::find(4)->usuarios()->attach(1);
        Aula::find(5)->usuarios()->attach(1);
        Aula::find(6)->usuarios()->attach(1);
        Aula::find(7)->usuarios()->attach(1);
        Aula::find(8)->usuarios()->attach(1);
        Aula::find(9)->usuarios()->attach(1);
        Aula::find(10)->usuarios()->attach(1);

    }
}
