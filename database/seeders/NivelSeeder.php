<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nivel;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nivel::create(['nivel' => 'GUARDERIA']);
        Nivel::create(['nivel' => 'INICIAL']);
        Nivel::create(['nivel' => 'PRIMARIA']);
        
        Nivel::create(['nivel' => 'SECUNDARIA']);
        Nivel::create(['nivel' => 'PREUNIVERSITARIO']);
        Nivel::create(['nivel' => 'INSTITUTO']);
        
        Nivel::create(['nivel' => 'UNIVERSITARIO']);
        Nivel::create(['nivel' => 'PROFESIONAL']);
    }
}
