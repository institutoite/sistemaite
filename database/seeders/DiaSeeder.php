<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dia;

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

        Dia::find(1)->usuarios()->attach(1);
        Dia::find(2)->usuarios()->attach(1);
        Dia::find(3)->usuarios()->attach(1);
        Dia::find(4)->usuarios()->attach(1);
        Dia::find(5)->usuarios()->attach(1);
        Dia::find(6)->usuarios()->attach(1);
        Dia::find(7)->usuarios()->attach(1);
    }
}
