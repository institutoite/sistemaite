<?php

namespace Database\Seeders;

use App\Models\Administrativo;
use App\Models\Persona;
use Illuminate\Database\Seeder;

class AdministrativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Persona::create([
        //     'nombre' => 'Susana',
        //     'apellidop' => 'Petiga',
        //     'apellidom' => 'Masay',
        //     'fechanacimiento' => '15-05-2015',
        //     'direccion' => 'Barrio Melgar',
        //     'carnet' => '456135',
        //     'expedido' => 'BEN',
        //     'genero' => 'MUJER',
        //     'pais_id' => 1,
        //     'ciudad_id' => 6,
        //     'zona_id' => 1,
        //     'como' => "FACEBOOK",
        //     'foto' => "estudiantes/foto.jpg",
        //     'papelinicial' => 'administrativo',
        // ]);
        // Persona::create([
        //     'nombre' => 'Benilda',
        //     'apellidop' => 'Fernandez',
        //     'apellidom' => 'Mora',
        //     'fechanacimiento' => '15-05-2015',
        //     'direccion' => 'Barrio Tres lagunas',
        //     'carnet' => '45613545',
        //     'expedido' => 'BEN',
        //     'genero' => 'MUJER',
        //     'pais_id' => 1,
        //     'ciudad_id' => 6,
        //     'zona_id' => 1,
        //     'como' => "FACEBOOK",
        //     'foto' => "estudiantes/foto.jpg",
        //     'papelinicial' => 'administrativo',
        // ]);
        
        Administrativo::create([
            'cargo'=>'Secreataria',
            'fechaingreso'=>'2021-05-12',
            'diasprueba'=>3,
            'estado'=>1,
            'sueldo'=>2000,
            'persona_id'=>3,
        ]);
        Administrativo::create([
            'cargo'=>'Directora',
            'fechaingreso'=>'2021-05-12',
            'diasprueba'=>3,
            'estado'=>1,
            'sueldo'=>2000,
            'persona_id'=>2,
        ]);
        Administrativo::find(1)->usuarios()->attach(1);
        Administrativo::find(2)->usuarios()->attach(1);
        // Administrativo::create([
        //     'cargo'=>'empleada domestica',
        //     'fechaingreso'=>'2021-05-12',
        //     'diasprueba'=>3,
        //     'estado'=>1,
        //     'sueldo'=>2000,
        //     'persona_id'=>37,
        // ]);
    }
}
