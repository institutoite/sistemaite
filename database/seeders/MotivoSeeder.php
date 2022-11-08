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
        Motivo::create(['motivo' => "No hay quien le ayuda por que no tienen capacidad",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "En casa hay alguien con capacidad pero no tiene tiempo",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "Quire nivelarse por que esta atrazado /a",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "Quiere ir adelantando",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "No asistio a clases por motivo salud",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "No asistio a clases por otros motivos",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "Se cambio de colegio y se quiere nivelar",'tipomotivo_id'=>1]);
        Motivo::create(['motivo' => "Cambio de residencia",'tipomotivo_id'=>1]);
        
        Motivo::create(['motivo' => "Simplemente aprender",'tipomotivo_id'=>2]);
        Motivo::create(['motivo' => "Por que lo necesita para su trabajo",'tipomotivo_id'=>2]);
        Motivo::create(['motivo' => "Quiere actualizarse",'tipomotivo_id'=>2]);
        Motivo::create(['motivo' => "Ya estudio computación, pero se olvidó",'tipomotivo_id'=>2]);
        
        Motivo::create(['motivo' => "Consiguió trabajo",'tipomotivo_id'=>3]);
        Motivo::create(['motivo' => "Quiere que aprenda algo",'tipomotivo_id'=>3]);
        Motivo::create(['motivo' => "Empezo las clases la persona que cuida se va a clases",'tipomotivo_id'=>3]);
        Motivo::create(['motivo' => "Necesita estimular alguna habilidad",'tipomotivo_id'=>3]);
        
        Motivo::create(['motivo' => "Enfemedad o Salud",'tipomotivo_id'=>4]); 
        Motivo::create(['motivo' => "Tiene mucha tarea de otras materias su centro educativo",'tipomotivo_id'=>4]); 
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

        for ($i=1; $i <39 ; $i++) { 
            Motivo::find(1)->usuarios()->attach(1);
        }

        
    }
}
