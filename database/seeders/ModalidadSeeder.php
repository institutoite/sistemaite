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
        /* MODALIDADADES DE GUARDERIA*/
        Modalidad::create([
            'modalidad' => 'Guardería por hora libre',
            'costo' => 25,
            'cargahoraria' => 1,
            'nivel_id' => 1
        ]);

        Modalidad::create([
            'modalidad' => 'Guardería turno mañana',
            'costo' => 600,
            'cargahoraria' => 100,
            'nivel_id' => 1
        ]);
        Modalidad::create([
            'modalidad' => 'Guardería turno tarde',
            'costo' => 550,
            'cargahoraria' => 100,
            'nivel_id' => 1
        ]);
        Modalidad::create([
            'modalidad' => 'Guardería todo el día',
            'costo' => 1000,
            'cargahoraria' => 100,
            'nivel_id' => 1
        ]);
        Modalidad::create([
            'modalidad' => 'Guardería hotelito',
            'costo' => 100,
            'cargahoraria' => 8,
            'nivel_id' => 1
        ]);
        Modalidad::create([
            'modalidad' => 'Hora libre Primaria',
            'costo' => 40,
            'cargahoraria' => 1,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'Mes 1LV1H Primaria',
            'costo' => 420,
            'cargahoraria' => 20,
            'nivel_id' => 3
        ]);
        
        Modalidad::find(1)->usuarios()->attach(1);
        Modalidad::find(2)->usuarios()->attach(1);
        Modalidad::find(3)->usuarios()->attach(1);
        Modalidad::find(4)->usuarios()->attach(1);
        Modalidad::find(5)->usuarios()->attach(1);
        Modalidad::find(6)->usuarios()->attach(1);
        Modalidad::find(7)->usuarios()->attach(1);
  
        
    }
}
