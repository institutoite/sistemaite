<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Persona;
use App\Estudiante;
use App\Observacion;

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
        Observacion::create(['observable_id' => 1,'activo'=>1,'observable_type'=>'App\Estudiante','observacion'=>'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 2,'activo'=>1,'observable_type'=>'App\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 3,'activo'=>1,'observable_type'=>'App\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);

        Observacion::create(['observable_id' => 4,'activo'=>1,'observable_type'=>'App\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 5,'activo'=>1,'observable_type'=>'App\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 6,'activo'=>1,'observable_type'=>'App\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);

        Observacion::create(['observable_id' => 7,'activo'=>1,'observable_type'=>'App\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 8,'activo'=>1,'observable_type'=>'App\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);
        Observacion::create(['observable_id' => 9,'activo'=>1,'observable_type'=>'App\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);

        Observacion::create(['observable_id' => 10,'activo'=>1,'observable_type'=>'App\Estudiante', 'observacion' => 'Esto es un requerimiento de prueba solamente']);

       

    }
}
