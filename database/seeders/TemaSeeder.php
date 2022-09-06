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
        


        
    }
}
