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
        Nivel::create(['nivel' => 'Guarderia']);
        Nivel::create(['nivel' => 'Inicial']);
        Nivel::create(['nivel' => 'Primaria']);
        
        Nivel::create(['nivel' => 'Secundaria']);
        Nivel::create(['nivel' => 'Pre-Universitario']);
        Nivel::create(['nivel' => 'Instituto']);
        
        Nivel::create(['nivel' => 'Universitario']);
        Nivel::create(['nivel' => 'Profesional']);

        Nivel::findOrFail(1)->userable()->create(['user_id'=>1]);
        Nivel::findOrFail(2)->userable()->create(['user_id'=>1]);
        Nivel::findOrFail(3)->userable()->create(['user_id'=>1]);
        
        Nivel::findOrFail(4)->userable()->create(['user_id'=>1]);
        Nivel::findOrFail(5)->userable()->create(['user_id'=>1]);
        Nivel::findOrFail(6)->userable()->create(['user_id'=>1]);
        
        Nivel::findOrFail(7)->userable()->create(['user_id'=>1]);
        Nivel::findOrFail(8)->userable()->create(['user_id'=>1]);
    }
}
