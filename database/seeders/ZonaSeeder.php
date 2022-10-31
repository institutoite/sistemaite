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
        Zona::create(['zona' => 'ZONA SUR', 'ciudad_id' => 6]);
        
        Zona::create(['zona' => 'ZONA 4 DE NOVIEMBRE', 'ciudad_id' => 6]);

 
        
    }
}
