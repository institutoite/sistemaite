<?php

namespace Database\Seeders;

use App\Models\Modalidad;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modalidad::create([
            'modalidad'=>'Hora Libre',
            'costo'=>40,
            'cargahoraria'=>1,
            'nivel_id'=>4
        ]);

        Modalidad::create([
            'modalidad' => 'Semana',
            'costo' => 165,
            'cargahoraria' => 5,
            'nivel_id' => 4
        ]);

        Modalidad::create([
            'modalidad' => 'Quincenal',
            'costo' => 265,
            'cargahoraria' => 10,
            'nivel_id' => 4
        ]);

        Modalidad::create([
            'modalidad' => 'Mensual',
            'costo' => 420,
            'cargahoraria' => 20,
            'nivel_id' => 4
        ]);

        Modalidad::create([
            'modalidad' => '2 Meses',
            'costo' => 750,
            'cargahoraria' => 40,
            'nivel_id' => 4
        ]);

        Modalidad::create([
            'modalidad' => '3 Meses',
            'costo' => 1050,
            'cargahoraria' => 60,
            'nivel_id' => 4
        ]);
    }
}
