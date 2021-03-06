<?php

namespace Database\Seeders;

use App\Models\Observacion;
use Illuminate\Database\Seeder;
use App\Models\Persona;


class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::factory()->count(30)->create();
        $a=1;
        while ($a <= 30) {
            $observacion=new Observacion();
            $observacion->observacion ="Esto es una observacion creada desde Seeder";
            $observacion->activo = 1;
            $observacion->observable_id = $a;
            $observacion->observable_type = "App\Models\Persona";
            $observacion->save();
            $a=$a+1;
        }
        
        Persona::create([
            'nombre' => 'Edgar',
            'apellidop' => 'Estrada',
            'apellidom' => 'Callizaya',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'Barrio Melgar',
            'carnet' => '456135',
            'expedido' => 'BEN',
            'genero' => 'HOMBRE',
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como' => "FACEBOOK",
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
            
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
            
        ]);

        Persona::create([
            'nombre' => 'MAYLIN',
            'apellidop' => 'RODAS',
            'apellidom' => '',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'Barrio Melgar',
            'carnet' => '456135',
            'expedido' => 'BEN',
            'genero' => 'MUJER',
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como' => "FACEBOOK",
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
            
        ]);
        Persona::create([
            'nombre' => 'LIA',
            'apellidop' => 'CARRION',
            'apellidom' => '',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'Barrio Melgar',
            'carnet' => '456135',
            'expedido' => 'BEN',
            'genero' => 'MUJER',
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como' => "FACEBOOK",
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
            
        ]);

        Persona::create([
            'nombre' => 'EDUARDO',
            'apellidop' => 'LOZA',
            'apellidom' => '',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'Barrio Melgar',
            'carnet' => '456135',
            'expedido' => 'BEN',
            'genero' => 'HOMBRE',
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como' => "FACEBOOK",
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
            
        ]);
    }
}
