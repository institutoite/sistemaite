<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zona;

class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zona::create(['zona' => 'VILLA 1 DE MAYO', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'PLAN 3000', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'CAMBODROMO', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'LAS CABAÑAS DEL PIRAI', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'LOS LOTES', 'ciudad_id' => 6]);
        
        Zona::create(['zona' => 'LA PAMPA', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'LOS CHACOS', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'LA CUCHILLA', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'LA CHACARILLA', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'EL PALMAR DEL ORATORIO', 'ciudad_id' => 6]);
        
        Zona::create(['zona' => 'EQUIPETROL', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'LOS POZOS', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'LA RAMADA', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'DOBLE VIA LA GUARDIA', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'PLAN 4000', 'ciudad_id' => 6]);
        
        Zona::create(['zona' => 'CENTRO', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'SATELITE NORTE', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'PAURITO', 'ciudad_id' => 6]);
        Zona::create(['zona' => 'ZONA NORTE', 'ciudad_id' => 6]);

        // Zona::findOrFail(1)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(2)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(3)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(4)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(5)->userable()->create(['user_id'=>1]);

        // Zona::findOrFail(6)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(7)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(8)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(9)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(10)->userable()->create(['user_id'=>1]);

        // Zona::findOrFail(11)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(12)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(13)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(14)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(15)->userable()->create(['user_id'=>1]);

        // Zona::findOrFail(16)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(17)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(18)->userable()->create(['user_id'=>1]);
        // Zona::findOrFail(19)->userable()->create(['user_id'=>1]);
        
    }
}
