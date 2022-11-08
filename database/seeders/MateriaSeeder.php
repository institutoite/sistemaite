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
        Materia::create(['materia'=>'ALGEBRA I II']);
        Materia::create(['materia'=>'ALGEBRA I II']);
        Materia::create(['materia'=>'LENGUAJE']);
        Materia::create(['materia'=>'FILOSOFIA']);
        
        Materia::create(['materia'=>'PSICOLOGIA']);
        Materia::create(['materia'=>'HISTORIA']);
        Materia::create(['materia'=>'INGLES']);
        Materia::create(['materia'=>'BIOLOGIA']);
        Materia::create(['materia'=>'ESTADISTICA']);
        
        Materia::create(['materia'=>'CALCULO']);
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

        Materia::find(1)->usuarios()->attach(1);
        Materia::find(2)->usuarios()->attach(1);
        Materia::find(3)->usuarios()->attach(1);
        Materia::find(4)->usuarios()->attach(1);
        Materia::find(5)->usuarios()->attach(1);
        Materia::find(6)->usuarios()->attach(1);
        Materia::find(7)->usuarios()->attach(1);
        Materia::find(8)->usuarios()->attach(1);
        Materia::find(9)->usuarios()->attach(1);

        Materia::find(10)->usuarios()->attach(1);
        Materia::find(11)->usuarios()->attach(1);
        Materia::find(12)->usuarios()->attach(1);
        Materia::find(13)->usuarios()->attach(1);
        Materia::find(14)->usuarios()->attach(1);
        Materia::find(15)->usuarios()->attach(1);
        Materia::find(16)->usuarios()->attach(1);
        Materia::find(17)->usuarios()->attach(1);
        Materia::find(18)->usuarios()->attach(1);
        Materia::find(19)->usuarios()->attach(1);

        Materia::find(20)->usuarios()->attach(1);
        Materia::find(21)->usuarios()->attach(1);
        Materia::find(22)->usuarios()->attach(1);
        Materia::find(23)->usuarios()->attach(1);
        Materia::find(24)->usuarios()->attach(1);
        Materia::find(25)->usuarios()->attach(1);
        Materia::find(26)->usuarios()->attach(1);
        Materia::find(27)->usuarios()->attach(1);
        Materia::find(28)->usuarios()->attach(1);
        Materia::find(29)->usuarios()->attach(1);

        
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
