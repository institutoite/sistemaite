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

        Userable::create(["user_id"=>1,"userable_id"=>1,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>2,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>3,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>4,"userable_type"=>"App\Models\Asignatura"]);
        
        Userable::create(["user_id"=>1,"userable_id"=>5,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>6,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>7,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>8,"userable_type"=>"App\Models\Asignatura"]);
        
        Userable::create(["user_id"=>1,"userable_id"=>9,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>10,"userable_type"=>"App\Models\Asignatura"]);
        
        Userable::create(["user_id"=>1,"userable_id"=>11,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>12,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>13,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>14,"userable_type"=>"App\Models\Asignatura"]);
        
        Userable::create(["user_id"=>1,"userable_id"=>15,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>16,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>17,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>18,"userable_type"=>"App\Models\Asignatura"]);
        
        Userable::create(["user_id"=>1,"userable_id"=>19,"userable_type"=>"App\Models\Asignatura"]);
        Userable::create(["user_id"=>1,"userable_id"=>20,"userable_type"=>"App\Models\Asignatura"]);
        
    }
}
