<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Computacion;
use App\Models\Observacion;

class ComputacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Observacion::create(['observable_id' => 1, 'activo' => 1, 'observable_type' => 'App\Models\Computacion', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 2, 'activo' => 1, 'observable_type' => 'App\Models\Computacion', 'observacion' => 'Esto es un requerimiento de prueba solamente']);

        Computacion::create(['persona_id' => 1]);
        Computacion::create(['persona_id' => 2]);
    }
}
