<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asignatura;
use App\Models\Userable;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** opereador de Computadoras */
        Asignatura::create(['asignatura'=>'WINDOWS','carrera_id'=>1]);
        Asignatura::create(['asignatura'=>'MICROSOFT WORD','carrera_id'=>1]);
        Asignatura::create(['asignatura'=>'MICROSOFT EXCEL','carrera_id'=>1]);
        Asignatura::create(['asignatura'=>'MICROSOFT POWER POINT','carrera_id'=>1]);
        Asignatura::create(['asignatura'=>'MICROSOFT PUBLISHER','carrera_id'=>1]);
        Asignatura::create(['asignatura'=>'WEB E INTERNET','carrera_id'=>1]);
        Asignatura::create(['asignatura'=>'DACTILOGRAFIA COMPUTARIZADA','carrera_id'=>1]);
        Asignatura::create(['asignatura'=>'OFFICE AVANZADO','carrera_id'=>1]);
        Asignatura::create(['asignatura'=>'UTILIDADES OFIMATICAS','carrera_id'=>1]);
        Asignatura::create(['asignatura'=>'PROYECTO','carrera_id'=>1]);

        /** %%%%%%%%%%%%%%%%%%%%  diseño grafico %%%%%%%%%%%%%%%%%*/

        Asignatura::create(['asignatura'=>'ILLUSTRATOR I','carrera_id'=>2]);
        Asignatura::create(['asignatura'=>'ILLUSTRATOR II','carrera_id'=>2]);
        Asignatura::create(['asignatura'=>'PHOTOSHOP I','carrera_id'=>2]);
        Asignatura::create(['asignatura'=>'PHOTOSHOP II','carrera_id'=>2]);
        Asignatura::create(['asignatura'=>'CAMTASIA STUDIO','carrera_id'=>2]);
        Asignatura::create(['asignatura'=>'ADOBE PREMIERE','carrera_id'=>2]);
        Asignatura::create(['asignatura'=>'ADOBE INDESIGN','carrera_id'=>2]);
        Asignatura::create(['asignatura'=>'ADOBO AFTER EFECT','carrera_id'=>2]);
        Asignatura::create(['asignatura'=>'PROYECTO I','carrera_id'=>2]);
        Asignatura::create(['asignatura'=>'PROYECTO II','carrera_id'=>2]);

        Asignatura::find(1)->usuarios()->attach(1);
        Asignatura::find(2)->usuarios()->attach(1);
        Asignatura::find(3)->usuarios()->attach(1);
        Asignatura::find(4)->usuarios()->attach(1);
        Asignatura::find(5)->usuarios()->attach(1);
        Asignatura::find(6)->usuarios()->attach(1);
        Asignatura::find(7)->usuarios()->attach(1);
        Asignatura::find(8)->usuarios()->attach(1);
        Asignatura::find(9)->usuarios()->attach(1);
        Asignatura::find(10)->usuarios()->attach(1);

        Asignatura::find(11)->usuarios()->attach(1);
        Asignatura::find(12)->usuarios()->attach(1);
        Asignatura::find(13)->usuarios()->attach(1);
        Asignatura::find(14)->usuarios()->attach(1);
        Asignatura::find(15)->usuarios()->attach(1);
        Asignatura::find(16)->usuarios()->attach(1);
        Asignatura::find(17)->usuarios()->attach(1);
        Asignatura::find(18)->usuarios()->attach(1);
        Asignatura::find(19)->usuarios()->attach(1);
        Asignatura::find(20)->usuarios()->attach(1);

        
        
    }
}
