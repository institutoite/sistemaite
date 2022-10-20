<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Constante;
class ConstanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Constante::create(['constante' => 'FACTORGUARDERIA','valor' =>'1.25']);
        Constante::create(['constante' => 'FACTORCOSTOHORAGUARDERIA','valor' =>'15']);
        Constante::create(['constante' => 'FACTORGUARDERIAMENOR111','valor' =>'0.01']);
        Constante::create(['constante' => 'FACTORGUARDERIAMAYOR111','valor' =>'0.00205']);
    }
}
