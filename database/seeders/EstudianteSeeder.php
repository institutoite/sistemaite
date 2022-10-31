<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Estudiante;
use App\Models\Observacion;
use App\Models\Persona;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Observacion::create(['observable_id' => 2, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Estudiante::create(['persona_id' => 2]);
        Persona::find(2)->usuarios()->attach(1);
    }
}
 