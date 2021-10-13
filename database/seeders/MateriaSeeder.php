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
    }

        
}
