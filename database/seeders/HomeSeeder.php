<?php

namespace Database\Seeders;

use App\Models\Hometext;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hometext::create([
            'banner' => 'Guardería, Inicial, Primaria, Secundaria,
            Pre-Universitario, Universitario, Profesionales',
            'heading' => 'Empezamos cuando te inscribas',
            'subheading' => 'Capacitate, especializate en todas las materia y aprende lo que realmente necesites, aprende a tu ritmo de compresión.'
        ]);
    }
}