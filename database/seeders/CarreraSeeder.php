<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Carrera;
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
            'precio' => '850',
            'docente_id' => '1'
        ]);
        Carrera::create([
            'carrera'=>'Diseño Gráfico',
            'description' => 'descripcion de Diseño Gráfico',
            'precio' => '850',
            'docente_id' => '1'
        ]);
        Carrera::create([
            'carrera'=>'Mantenimiento y Reparacion de Computadoras',
            'description' => 'descripcion de Mantenimiento y Reparacion de Computadora',
            'precio' => '850',
            'docente_id' => '1'
        ]);
        Carrera::create([
            'carrera'=>'Robotica',
            'description' => 'descripcion de Robotica',
            'precio' => '850',
            'docente_id' => '1'
        ]);
        Carrera::create([
            'carrera'=>'Marketing Digital',
            'description' => 'descripcion de Marketing Digital',
            'precio' => '850',
            'docente_id' => '1'
        ]);
    }
}
