<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Persona;
use App\Estudiante;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::factory()->count(10)->create();
        Estudiante::create(['persona_id' => 1,'requerimiento'=>'Esto es un requerimiento de prueba solamente']);
        Estudiante::create(['persona_id' => 2, 'requerimiento' => 'Esto es un requerimiento de prueba solamente']);
        Estudiante::create(['persona_id' => 3, 'requerimiento' => 'Esto es un requerimiento de prueba solamente']);

        Estudiante::create(['persona_id' => 4, 'requerimiento' => 'Esto es un requerimiento de prueba solamente']);
        Estudiante::create(['persona_id' => 5, 'requerimiento' => 'Esto es un requerimiento de prueba solamente']);
        Estudiante::create(['persona_id' => 6, 'requerimiento' => 'Esto es un requerimiento de prueba solamente']);

        Estudiante::create(['persona_id' => 7, 'requerimiento' => 'Esto es un requerimiento de prueba solamente']);
        Estudiante::create(['persona_id' => 8, 'requerimiento' => 'Esto es un requerimiento de prueba solamente']);
        Estudiante::create(['persona_id' => 9, 'requerimiento' => 'Esto es un requerimiento de prueba solamente']);

        Estudiante::create(['persona_id' => 10, 'requerimiento' => 'Esto es un requerimiento de prueba solamente']);

    }
}
