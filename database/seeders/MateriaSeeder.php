<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materia;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materia::create(['materia'=>'MATEMATICA']);
        Materia::create(['materia'=>'FISICA']);
        Materia::create(['materia'=>'QUIMICA']);
        Materia::create(['materia'=>'LENGUAJE']);
        Materia::create(['materia'=>'FILOSOFIA']);
        Materia::create(['materia'=>'PSICOLOGIA']);
        Materia::create(['materia'=>'HISTORIA']);
        Materia::create(['materia'=>'INGLES']);
        Materia::create(['materia'=>'BIOLOGIA']);
        Materia::create(['materia'=>'ESTADISTICA']);
        Materia::create(['materia'=>'CALCULO I']);
        Materia::create(['materia'=>'PROGRAMACION']);
        Materia::create(['materia'=>'WORD']);
        Materia::create(['materia'=>'WINDOWS']);
        Materia::create(['materia'=>'EXCEL']);
        Materia::create(['materia'=>'POWER POINT']);
        Materia::create(['materia'=>'PUBLISHER']);
        Materia::create(['materia'=>'UTILIDADADES OFIMATICAS']);
        Materia::create(['materia'=>'INTERNET']);
        Materia::create(['materia'=>'DACTILOGRAFIA']);
        Materia::create(['materia'=>'PHOTHOSHOP']);
        Materia::create(['materia'=>'FREEHAND']);
        Materia::create(['materia'=>'ADOBE ILLUSTRATOS']);
        Materia::create(['materia'=>'ADOBE PREMIERE']);
        Materia::create(['materia'=>'ADOBE INDESIGN']);
        Materia::create(['materia'=>'ADOBE AUDITION']);
        Materia::create(['materia'=>'CAMTASIA']);
        Materia::create(['materia'=>'EXCEL INTERMEDIO']);
        Materia::create(['materia'=>'EXCEL AVANZADO']);

        Materia::find(1)->niveles()->attach(1, ['materia_id' => 1]);
        Materia::find(1)->niveles()->attach(1, ['materia_id' => 4]);
        
        Materia::find(1)->niveles()->attach(2, ['materia_id' => 1]);
        Materia::find(1)->niveles()->attach(2, ['materia_id' => 4]);
        
        Materia::find(1)->niveles()->attach(3, ['materia_id' => 1]);
        Materia::find(1)->niveles()->attach(3, ['materia_id' => 4]);
        Materia::find(1)->niveles()->attach(3, ['materia_id' => 7]);
        
        Materia::find(1)->niveles()->attach(4, ['materia_id' => 1]);
        Materia::find(1)->niveles()->attach(4, ['materia_id' => 2]);
        Materia::find(1)->niveles()->attach(4, ['materia_id' => 3]);
        Materia::find(1)->niveles()->attach(4, ['materia_id' => 4]);
        Materia::find(1)->niveles()->attach(4, ['materia_id' => 5]);
        Materia::find(1)->niveles()->attach(4, ['materia_id' => 6]);
        Materia::find(1)->niveles()->attach(4, ['materia_id' => 7]);
        Materia::find(1)->niveles()->attach(4, ['materia_id' => 8]);
        Materia::find(1)->niveles()->attach(4, ['materia_id' => 9]);
    }
}
