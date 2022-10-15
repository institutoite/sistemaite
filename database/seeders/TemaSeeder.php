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
        
        Tema::find(1)->usuarios()->attach(1);
        Tema::find(2)->usuarios()->attach(1);
        Tema::find(3)->usuarios()->attach(1);
        Tema::find(4)->usuarios()->attach(1);
        Tema::find(5)->usuarios()->attach(1);
        Tema::find(6)->usuarios()->attach(1);
        Tema::find(7)->usuarios()->attach(1);
        Tema::find(8)->usuarios()->attach(1);
        Tema::find(9)->usuarios()->attach(1);
    }
}
