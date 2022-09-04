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


        Motivo::find(1)->usuarios()->attach(1);
        Motivo::find(2)->usuarios()->attach(1);
        Motivo::find(3)->usuarios()->attach(1);
        Motivo::find(4)->usuarios()->attach(1);
        Motivo::find(5)->usuarios()->attach(1);
        Motivo::find(6)->usuarios()->attach(1);
        Motivo::find(7)->usuarios()->attach(1);
        Motivo::find(8)->usuarios()->attach(1);
        Motivo::find(9)->usuarios()->attach(1);

        Motivo::find(10)->usuarios()->attach(1);
        Motivo::find(11)->usuarios()->attach(1);
        Motivo::find(12)->usuarios()->attach(1);
        Motivo::find(13)->usuarios()->attach(1);
        Motivo::find(14)->usuarios()->attach(1);
        Motivo::find(15)->usuarios()->attach(1);
        Motivo::find(16)->usuarios()->attach(1);
        Motivo::find(17)->usuarios()->attach(1);
        Motivo::find(18)->usuarios()->attach(1);
        Motivo::find(19)->usuarios()->attach(1);

        Motivo::find(20)->usuarios()->attach(1);
        Motivo::find(21)->usuarios()->attach(1);
        Motivo::find(22)->usuarios()->attach(1);
        Motivo::find(23)->usuarios()->attach(1);
        Motivo::find(24)->usuarios()->attach(1);
        Motivo::find(25)->usuarios()->attach(1);
        Motivo::find(26)->usuarios()->attach(1);
        Motivo::find(27)->usuarios()->attach(1);
        Motivo::find(28)->usuarios()->attach(1);
        Motivo::find(29)->usuarios()->attach(1);
        
        Motivo::find(30)->usuarios()->attach(1);
        Motivo::find(31)->usuarios()->attach(1);
        Motivo::find(32)->usuarios()->attach(1);
    }
}
