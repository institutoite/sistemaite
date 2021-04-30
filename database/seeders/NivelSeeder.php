<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Nivel;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nivel::create(['nivel' => 'Guardería']);
        Nivel::create(['nivel' => 'Inicial']);
        Nivel::create(['nivel' => 'Primaria']);
        
        Nivel::create(['nivel' => 'Secundaria']);
        Nivel::create(['nivel' => 'PreUniversitario']);
        Nivel::create(['nivel' => 'Instituto']);
        
        Nivel::create(['nivel' => 'Universitario']);
        Nivel::create(['nivel' => 'Profesionales']);
    }
}
