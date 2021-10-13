<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grado;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::create(['grado' => 'guarderia','nivel_id'=>1]);
        Grado::create(['grado' => 'Nidito', 'nivel_id' =>1 ]);
        Grado::create(['grado' => 'Pre Kinder','nivel_id'=>2]);
        Grado::create(['grado' => 'Kinder','nivel_id'=>2]);
        
        Grado::create(['grado' => 'Primero primaria','nivel_id'=>3]);
        Grado::create(['grado' => 'Segundo primaria','nivel_id'=>3]);
        Grado::create(['grado' => 'Tercero primaria','nivel_id'=>3]);
        Grado::create(['grado' => 'Cuarto primaria','nivel_id'=>3]);
        Grado::create(['grado' => 'Quinto primaria','nivel_id'=>3]);
        Grado::create(['grado' => 'Sexto primaria','nivel_id'=>3]);

        Grado::create(['grado' => 'Primero Secundaria', 'nivel_id' => 4]);
        Grado::create(['grado' => 'Segundo Secundaria', 'nivel_id' => 4]);
        Grado::create(['grado' => 'Tercero Secundaria', 'nivel_id' => 4]);
        Grado::create(['grado' => 'Cuarto Secundaria', 'nivel_id' => 4]);
        Grado::create(['grado' => 'Quinto Secundaria', 'nivel_id' => 4]);
        Grado::create(['grado' => 'Sexto Secundaria', 'nivel_id' => 4]);

        Grado::create(['grado' => 'pre-universitario', 'nivel_id' =>5]);
        Grado::create(['grado' => 'colegio militar', 'nivel_id' => 5]);
        Grado::create(['grado' => 'escuela policiaca', 'nivel_id' => 5]);
        
        Grado::create(['grado' => 'Primer Semestre Institutos', 'nivel_id' =>6]);
        Grado::create(['grado' => 'Segundo Semestre Institutos', 'nivel_id' =>6]);
        Grado::create(['grado' => 'Tercer Semestre Institutos', 'nivel_id' =>6]);
        Grado::create(['grado' => 'Cuarto Semestre Institutos', 'nivel_id' =>6]);
        Grado::create(['grado' => 'Quinto Semestre Institutos', 'nivel_id' =>6]);
        Grado::create(['grado' => 'Sexto Semestre Institutos', 'nivel_id' =>6]);

        Grado::create(['grado' => 'Primer Año Institutos', 'nivel_id' => 6]);
        Grado::create(['grado' => 'Segundo Año Institutos', 'nivel_id' => 6]);
        Grado::create(['grado' => 'Tercer Año Institutos', 'nivel_id' => 6]);

        Grado::create(['grado' => 'Primer Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Segundo Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Tercer Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Cuarto Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Quinto Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Sexto Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Septimo Semestre Universidad', 'nivel_id' =>7 ]);
        Grado::create(['grado' => 'Octavo Semestre Universidad', 'nivel_id' =>7 ]);
        Grado::create(['grado' => 'Noveno Semestre Universidad', 'nivel_id' =>7 ]);
        Grado::create(['grado' => 'Decimo Semestre Universidad', 'nivel_id' =>7 ]);
        
        Grado::create(['grado' => 'Proyecto Grado', 'nivel_id' =>8 ]);
        Grado::create(['grado' => 'Maestría', 'nivel_id' => 8]);
        Grado::create(['grado' => 'Diplomado', 'nivel_id' =>8]);
        Grado::create(['grado' => 'Profesional', 'nivel_id' => 8]);
    }
}
