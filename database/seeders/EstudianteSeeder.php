<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Estudiante;
use App\Models\Observacion;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Observacion::create(['observable_id' => 1, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 2, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 3, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);

        Observacion::create(['observable_id' => 4, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 5, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 6, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);

        Observacion::create(['observable_id' => 7, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 8, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 9, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 10, 'activo' => 1, 'observable_type' => 'App\Models\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);

        Estudiante::create(['persona_id' => 1]);
        Estudiante::create(['persona_id' => 2]);
        Estudiante::create(['persona_id' => 3]);
        Estudiante::create(['persona_id' => 4]);
        Estudiante::create(['persona_id' => 5]);
        Estudiante::create(['persona_id' => 6]);
        Estudiante::create(['persona_id' => 7]);
        Estudiante::create(['persona_id' => 8]);
        Estudiante::create(['persona_id' => 9]);
        Estudiante::create(['persona_id' => 10]);
    }
}
 