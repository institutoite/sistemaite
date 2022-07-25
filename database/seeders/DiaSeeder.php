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

        // Dia::findOrFail(1)->userable()->create(['user_id'=>1]);
        // Dia::findOrFail(2)->userable()->create(['user_id'=>1]);
        // Dia::findOrFail(3)->userable()->create(['user_id'=>1]);
        // Dia::findOrFail(4)->userable()->create(['user_id'=>1]);
        // Dia::findOrFail(5)->userable()->create(['user_id'=>1]);
        // Dia::findOrFail(6)->userable()->create(['user_id'=>1]);
        // Dia::findOrFail(7)->userable()->create(['user_id'=>1]);
    }
}
