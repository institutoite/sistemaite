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
        /*  Nivel::create(['nivel' => 'Guardería']);
        Nivel::create(['nivel' => 'Inicial']);
        Nivel::create(['nivel' => 'Primaria']);
        
        Nivel::create(['nivel' => 'Secundaria']);
        Nivel::create(['nivel' => 'PreUniversitario']);
        Nivel::create(['nivel' => 'Instituto']);
        
        Nivel::create(['nivel' => 'Universitario']);
        Nivel::create(['nivel' => 'Profesionales']); */

        /* MODALIDADADES DE GUARDERIA*/
        
        Modalidad::create([
            'modalidad' => 'GUARDERIA POR HORA LIBRE',
            'costo' => 15,
            'cargahoraria' => 1,
            'nivel_id' => 1
        ]);

        Modalidad::create([
            'modalidad' => 'GUARDERIA TURNO MAÑANA',
            'costo' => 550,
            'cargahoraria' => 100,
            'nivel_id' => 1
        ]);
        Modalidad::create([
            'modalidad' => 'GUARDERIA TURNO TARDE',
            'costo' => 550,
            'cargahoraria' => 100,
            'nivel_id' => 1
        ]);
        Modalidad::create([
            'modalidad' => 'GUARDERIA TODO EL DIA',
            'costo' => 900,
            'cargahoraria' => 100,
            'nivel_id' => 1
        ]);
        Modalidad::create([
            'modalidad' => 'GUARDERIA HOTELITO',
            'costo' => 100,
            'cargahoraria' => 8,
            'nivel_id' => 1
        ]);
        /* MODALIDADADES DE PRIMARIA*/
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

        /** MODALIDAD UNIVERSIDAD */
        Modalidad::create([
            'modalidad' => 'Hora Libre',
            'costo' => 40,
            'cargahoraria' => 1,
            'nivel_id' => 4
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
