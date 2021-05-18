<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Dia;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dia::create(['dia' => 'lunes']);
        Dia::create(['dia' => 'martes']);
        Dia::create(['dia' => 'miércoles']);
        Dia::create(['dia' => 'jueves']);
        Dia::create(['dia' => 'viernes']);
        Dia::create(['dia' => 'sábado']);
        Dia::create(['dia' => 'domingo']);
    }
}
