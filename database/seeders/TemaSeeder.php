<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tema;
class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Tema::create(['tema'=>'Sin Definir','materia_id'=>1]);
        Tema::create(['tema'=>'Resta de Naturales','materia_id'=>1]);
        Tema::create(['tema'=>'Multiplicación de Naturales','materia_id'=>1]);
        Tema::create(['tema'=>'División de Naturales','materia_id'=>1]);
        
        Tema::create(['tema'=>'Sin Definir','materia_id'=>2]);
        Tema::create(['tema' => 'Factor de Conversiones', 'materia_id' => 2]);
        Tema::create(['tema' => 'Despeje', 'materia_id' => 2]);
        Tema::create(['tema' => 'Notacion científica', 'materia_id' => 2]);
        Tema::create(['tema' => 'Movimiento rectilineo uniformemente variado MRUV', 'materia_id' => 1]);
        
        Tema::create(['tema'=>'Sin Definir','materia_id'=>3]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>4]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>5]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>6]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>7]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>8]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>9]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>10]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>11]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>12]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>13]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>14]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>15]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>16]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>17]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>18]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>19]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>20]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>21]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>22]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>23]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>24]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>25]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>26]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>27]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>28]);
        Tema::create(['tema'=>'Sin Definir','materia_id'=>29]);     
        
    }
}
