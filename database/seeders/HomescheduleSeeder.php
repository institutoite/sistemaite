<?php

namespace Database\Seeders;

use App\Models\Homeschedule;
use Illuminate\Database\Seeder;

class HomescheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Homeschedule::create([
            'title' => 'Horario Súper Especial',
            'description' => 'Lunes a Viernes 5.00 am - 6:00 am'
        ]);

        Homeschedule::create([
            'title' => 'Turno Mañana',
            'description' => 'Lunes a Sábado 7:30 - 12:00'
        ]);

        Homeschedule::create([
            'title' => 'Turno Tarde',
            'description' => 'Lunes a Viernes 2:00pm - 6:30pm'
        ]);

        Homeschedule::create([
            'title' => 'Turno Noche',
            'description' => 'Lu Ma Ju Vi 6:30pm - 21:00pm'
        ]);
    }
}
