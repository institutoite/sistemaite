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
        
        Persona::create([
            'nombre' => 'DAVID EDUARDO',
            'apellidop' => 'FLORES',
            'apellidom' => 'BELTRAN',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'Barrio Melgar',
            'carnet' => '456135',
            'expedido' => 'BEN',
            'habilitado' => 1,
            'telefono' => "71324941",
            'genero' => 'HOMBRE',
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como' => "FACEBOOK",
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
            
        ]);

        

        Persona::create([
            'nombre' => 'LIDIA',
            'apellidop' => 'CONTRERAS',
            'apellidom' => 'CATARI',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'Barrio Luis Soruco Barba',
            'carnet' => '45615535',
            'expedido' => 'BEN',
            'genero' => 'HOMBRE',
            'habilitado' => 1,
            'telefono' => "71324941",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como' => "FACEBOOK",
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'estudiante',
            
        ]);
        
        

        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial",
            "activo" =>1,
            "observable_id"=>1,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial",
            "activo" =>1,
            "observable_id"=>2,
            "observable_type"=>"App\Models\Persona",
        ]);

        // Persona::create([
        //     'nombre' => 'MAYLIN',
        //     'apellidop' => 'RODAS',
        //     'apellidom' => '',
        //     'fechanacimiento' => '15-05-2015',
        //     'direccion' => 'Barrio Melgar',
        //     'carnet' => '456135',
        //     'expedido' => 'BEN',
        //     'genero' => 'MUJER',
        //     'habilitado' => 1,
        //     'pais_id' => 1,
        //     'ciudad_id' => 6,
        //     'zona_id' => 1,
        //     'como' => "FACEBOOK",
        //     'foto' => "estudiantes/foto.jpg",
        //     'papelinicial' => 'docente',
            
        // ]);
        // Persona::create([
        //     'nombre' => 'VICTOR',
        //     'apellidop' => 'SOLIZ',
        //     'apellidom' => '',
        //     'fechanacimiento' => '15-05-2015',
        //     'direccion' => 'Barrio Warnes',
        //     'carnet' => '456135',
        //     'expedido' => 'BEN',
        //     'habilitado' => 1,
        //     'genero' => 'MUJER',
        //     'pais_id' => 1,
        //     'ciudad_id' => 6,
        //     'zona_id' => 1,
        //     'como' => "FACEBOOK",
        //     'foto' => "estudiantes/foto.jpg",
        //     'papelinicial' => 'docente',
            
        // ]);

        // Persona::create([
        //     'nombre' => 'EDUARDO',
        //     'apellidop' => 'LOZA',
        //     'apellidom' => '',
        //     'fechanacimiento' => '15-05-2015',
        //     'direccion' => 'Barrio Melgar',
        //     'carnet' => '456135',
        //     'expedido' => 'BEN',
        //     'habilitado' => 1,
        //     'genero' => 'HOMBRE',
        //     'pais_id' => 1,
        //     'ciudad_id' => 6,
        //     'zona_id' => 1,
        //     'como' => "FACEBOOK",
        //     'foto' => "estudiantes/foto.jpg",
        //     'papelinicial' => 'docente',
            
        // ]);

        // Persona::findOrFail(1)->userable()->create(['user_id'=>1]);
        // Persona::findOrFail(2)->userable()->create(['user_id'=>1]);
        // Persona::findOrFail(3)->userable()->create(['user_id'=>1]);
        // Persona::findOrFail(4)->userable()->create(['user_id'=>1]);
        // Persona::findOrFail(5)->userable()->create(['user_id'=>1]);
        
        
        
        
    }
}
