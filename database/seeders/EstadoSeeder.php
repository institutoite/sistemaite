<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['estado'=>'INDEFINIDO']);//1
        Estado::create(['estado'=>'PRESENTE']);//2
        Estado::create(['estado'=>'FALTA']);//3
        Estado::create(['estado'=>'CONGELADO']);//4
        Estado::create(['estado'=>'LICENCIA']);//5
        Estado::create(['estado'=>'FINALIZADO']);//6
        Estado::create(['estado'=>'RESERVADO']);//7
        Estado::create(['estado'=>'CORRIENDO']);//8
        Estado::create(['estado'=>'DESVIGENTE']);//9
        Estado::create(['estado'=>'FALTANOTIFICADA']);//10
        Estado::create(['estado'=>'HABILITADO']);//11
        Estado::create(['estado'=>'DESHABILITADO']);//12

        Estado::create(['estado'=>'ESPERANUEVO']);//12
        Estado::create(['estado'=>'ESPERAREINSCRIPCION']);//12
        Estado::create(['estado'=>'ESPERAREMATRICULACION']);//12
        Estado::create(['estado'=>'ESPERARETOMA']);//12
        Estado::create(['estado'=>'PROSPECTO']);//12
        Estado::create(['estado'=>'SEGUIMIENTO']);//12
        Estado::create(['estado'=>'CANCELADO']);//12
        Estado::create(['estado'=>'PERDID']);//12

        
        
        
     


        
        Estado::find(1)->usuarios()->attach(1);
        Estado::find(2)->usuarios()->attach(1);
        Estado::find(3)->usuarios()->attach(1);
        Estado::find(4)->usuarios()->attach(1);
        Estado::find(5)->usuarios()->attach(1);
        Estado::find(6)->usuarios()->attach(1);
        Estado::find(7)->usuarios()->attach(1);
        Estado::find(8)->usuarios()->attach(1);
        Estado::find(9)->usuarios()->attach(1);
        Estado::find(10)->usuarios()->attach(1);
        Estado::find(11)->usuarios()->attach(1);
        Estado::find(12)->usuarios()->attach(1);
    }
}
