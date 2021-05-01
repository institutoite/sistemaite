<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Docente;
use App\Persona;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'nombre' => 'Edgar',
            'apellidop' => 'Estrada',
            'apellidom' => 'Callizaya',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'Barrio Melgar',
            'carnet' => '456135',
            'expedido' =>'BEN',
            'genero' =>'HOMBRE',
            'pais_id'=>1,
            'ciudad_id'=>6,
            'zona_id'=>1,
            'como' => "FACEBOOK",
            'foto' => "estudiantes/foto.jpg",
            'papelinicial'=>'docente', 
            'idantiguo' => 0,
        ]);

        Persona::create([
            'nombre' => 'Cesar',
            'apellidop' => 'Calderon',
            'apellidom' => 'Maya',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'Barrio Luis Soruco Barba',
            'carnet' => '45615535',
            'expedido' => 'BEN',
            'genero' => 'HOMBRE',
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como' => "FACEBOOK",
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
            'idantiguo' => 0,
        ]);

        Docente::create([
            'sueldo'=>2000.00,
            'fecha_ingreso'=>'2000-10-12',
            'estado'=>'activo',
            'dias_prueba'=>2,
            'persona_id'=>11,
            ]);
        Docente::create([
            'sueldo' => 2000.00,
            'fecha_ingreso' => '1998-10-12',
            'estado' => 'activo',
            'dias_prueba' => 1,
            'persona_id' => 12,
        ]);
    }
}
