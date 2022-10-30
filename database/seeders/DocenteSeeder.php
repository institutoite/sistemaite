<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;
use Carbon\Carbon;


class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        Docente::create([
            'nombrecorto'=>'DAVID F',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>2000.00,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>1,
            ]);
        Docente::create([
            'nombrecorto'=>'LIDIA',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>2000.00,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>2,
            ]);
        Docente::create([
            'nombrecorto'=>'BENJAMIN C',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>2000.00,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>3,
            ]);
        Docente::create([
            'nombrecorto'=>'E. LOZA',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>2000.00,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>4,
            ]);
        Docente::create([
            'nombrecorto'=>'E. CACERES',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>2000.00,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>5,
            ]);
        Docente::create([
            'nombrecorto'=>'EDSON',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>2000.00,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>6,
            ]);
        Docente::create([
            'nombrecorto'=>'WILBERTH J',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>2000.00,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>7,
            ]);
        Docente::create([
            'nombrecorto'=>'ELSA F',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>1000,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>8,
            ]);
        Docente::create([
            'nombrecorto'=>'MAYLIN R',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>2000.00,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>9,
            ]);
        Docente::create([
            'nombrecorto'=>'M ISABEL',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>2000.00,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>10,
            ]);
       

        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 1]);
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 2]);
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 3]);
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 4]);
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 5]);
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 6]);
        
        //Docente::find(1)->usuarios()->attach(1);
    }
}
