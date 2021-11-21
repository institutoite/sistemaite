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
        Carrera::create(['carrera'=>'Operador de Computadoras']);
        Carrera::create(['carrera'=>'Diseño Gráfico']);
        Carrera::create(['carrera'=>'Mantenimiento y Reparacion de Computadoras']);
        Carrera::create(['carrera'=>'Robotica']);
        Carrera::create(['carrera'=>'Marketing Digital']);
    }
}
