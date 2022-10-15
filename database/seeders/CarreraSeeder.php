<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Carrera;
use App\Models\Userable;
class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Carrera::factory()->count(5)->create();
        Carrera::create([
            'carrera'=>'Operador de Computadoras',
            'description' => 'descripcion de operador',
            'precio' => '1750',
        ]);
        Carrera::create([
            'carrera'=>'Diseño Gráfico',
            'description' => 'descripcion de Diseño Gráfico',
            'precio' => '1750',
        ]);
        Carrera::create([
            'carrera'=>'Mantenimiento y Reparacion de Computadoras',
            'description' => 'descripcion de Mantenimiento y Reparacion de Computadora',
            'precio' => '1750',
        ]);
        Carrera::create([
            'carrera'=>'Robotica',
            'description' => 'descripcion de Robotica',
            'precio' => '1750',
        ]);
        Carrera::create([
            'carrera'=>'Marketing Digital',
            'description' => 'descripcion de Marketing Digital',
            'precio' => '1750',
        ]);
        
        Carrera::find(1)->usuarios()->attach(1);
        Carrera::find(2)->usuarios()->attach(1);
        Carrera::find(3)->usuarios()->attach(1);
        Carrera::find(4)->usuarios()->attach(1);
        Carrera::find(5)->usuarios()->attach(1);


    }
}
