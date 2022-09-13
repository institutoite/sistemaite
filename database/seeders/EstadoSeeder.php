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
    }
}
