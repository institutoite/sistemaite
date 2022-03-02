<?php

namespace Database\Seeders;

use App\Models\Motivo;
use App\Models\Userable;
use Illuminate\Database\Seeder;

class MotivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Motivo::create(['motivo' => "Tiene una práctico",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "Tiene un examen",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "Tiene una defenza",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "Tiene un profesor a domicilio, pero le falla mucho",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "En cada no tienen capacidad de ayudar",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "En casa hay alguien con capacidad pero no tiene tiempo",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "Quire nivelarse por que esta atrazado /a",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "Quiere ir adelantando",'tipomotivo_id'=>1]);
        
        Motivo::create(['motivo' => "Simplemente aprender",'tipomotivo_id'=>2]);
        Motivo::create(['motivo' => "Necesita aprender por su trabajo",'tipomotivo_id'=>2]);
        
        Motivo::create(['motivo' => "Consiguió trabajo",'tipomotivo_id'=>3]);
        Motivo::create(['motivo' => "Quiere que aprenda algo",'tipomotivo_id'=>3]);
        Motivo::create(['motivo' => "Empezo las clases la persona que cuida se va a clases",'tipomotivo_id'=>3]);
        Motivo::create(['motivo' => "Necesita estimular alguna habilidad",'tipomotivo_id'=>3]);
        
        Motivo::create(['motivo' => "Enfemedad o Salud",'tipomotivo_id'=>4]); 
        Motivo::create(['motivo' => "Tiene mucha tarea de otras materias en su centro educativo",'tipomotivo_id'=>4]); 
        Motivo::create(['motivo' => "Viaje",'tipomotivo_id'=>4]); 
        Motivo::create(['motivo' => "Clima lluvia",'tipomotivo_id'=>4]); 
        Motivo::create(['motivo' => "Problemas sociales",'tipomotivo_id'=>4]); 
        Motivo::create(['motivo' => "Otro Motivo",'tipomotivo_id'=>4]); 
        
        Motivo::create(['motivo' => "Enfemedad o Salud",'tipomotivo_id'=>5]); 
        Motivo::create(['motivo' => "Tiene mucha tarea de otras materias en su centro educativo",'tipomotivo_id'=>5]); 
        Motivo::create(['motivo' => "Viaje",'tipomotivo_id'=>5]); 
        Motivo::create(['motivo' => "Clima lluvia",'tipomotivo_id'=>5]); 
        Motivo::create(['motivo' => "Problemas sociales",'tipomotivo_id'=>5]); 
        Motivo::create(['motivo' => "Otro Motivo",'tipomotivo_id'=>5]); 
        
        Motivo::create(['motivo' => "Enfemedad o Salud",'tipomotivo_id'=>6]); 
        Motivo::create(['motivo' => "Tiene mucha tarea de otras materias en su centro educativo",'tipomotivo_id'=>6]); 
        Motivo::create(['motivo' => "Viaje",'tipomotivo_id'=>6]); 
        Motivo::create(['motivo' => "Clima lluvia",'tipomotivo_id'=>6]); 
        Motivo::create(['motivo' => "Problemas sociales",'tipomotivo_id'=>6]); 
        Motivo::create(['motivo' => "Otro Motivo",'tipomotivo_id'=>6]); 

        Userable::create(["user_id"=>1,"userable_id"=>1,"userable_type"=>"App\Models\Motivo"]);
        Userable::create(["user_id"=>1,"userable_id"=>2,"userable_type"=>"App\Models\Motivo"]);
        Userable::create(["user_id"=>1,"userable_id"=>3,"userable_type"=>"App\Models\Motivo"]);
        Userable::create(["user_id"=>1,"userable_id"=>4,"userable_type"=>"App\Models\Motivo"]);
        Userable::create(["user_id"=>1,"userable_id"=>5,"userable_type"=>"App\Models\Motivo"]);
        Userable::create(["user_id"=>1,"userable_id"=>6,"userable_type"=>"App\Models\Motivo"]);
        Userable::create(["user_id"=>1,"userable_id"=>7,"userable_type"=>"App\Models\Motivo"]);
        Userable::create(["user_id"=>1,"userable_id"=>8,"userable_type"=>"App\Models\Motivo"]);

        

    }
}
