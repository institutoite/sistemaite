<?php

namespace Database\Seeders;

use App\Models\Observacion;
use Illuminate\Database\Seeder;

class ObservacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* observacion para DOCENTS */
        Observacion::create([
            'observacion'=>'Observacion insertada desde Seeder',
            'activo'=>1,
            'observable_id'=>31,
            'observable_type'=> 'App\Models\Persona',
        ]);
        Observacion::create([
            'observacion'=>'Observacion insertada desde Seeder',
            'activo'=>1,
            'observable_id'=>32,
            'observable_type'=> 'App\Models\Persona',
        ]);
        Observacion::create([
            'observacion'=>'Observacion insertada desde Seeder',
            'activo'=>1,
            'observable_id'=>33,
            'observable_type'=> 'App\Models\Persona',
        ]);
        Observacion::create([
            'observacion'=>'Observacion insertada desde Seeder',
            'activo'=>1,
            'observable_id'=>34,
            'observable_type'=> 'App\Models\Persona',
        ]);
        Observacion::create([
            'observacion'=>'Observacion insertada desde Seeder',
            'activo'=>1,
            'observable_id'=>35,
            'observable_type'=> 'App\Models\Persona',
        ]);

        /* observaciones para administrativo */
        Observacion::create([
            'observacion'=>'Observacion insertada desde Seeder',
            'activo'=>1,
            'observable_id'=>36,
            'observable_type'=> 'App\Models\Persona',
        ]);
        Observacion::create([
            'observacion'=>'Observacion insertada desde Seeder',
            'activo'=>1,
            'observable_id'=>37,
            'observable_type'=> 'App\Models\Persona',
        ]);
    }
}
