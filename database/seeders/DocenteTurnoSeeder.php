<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocenteTurno;

class DocenteTurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docenteId = 1;

        $turnos = [
            ['docente_id' => $docenteId, 'dia_id' => 1, 'hora_inicio' => '07:30:00', 'hora_fin' => '12:00:00'],
            ['docente_id' => $docenteId, 'dia_id' => 2, 'hora_inicio' => '07:30:00', 'hora_fin' => '12:00:00'],
            ['docente_id' => $docenteId, 'dia_id' => 3, 'hora_inicio' => '07:30:00', 'hora_fin' => '12:00:00'],
            ['docente_id' => $docenteId, 'dia_id' => 4, 'hora_inicio' => '07:30:00', 'hora_fin' => '12:00:00'],
            ['docente_id' => $docenteId, 'dia_id' => 5, 'hora_inicio' => '07:30:00', 'hora_fin' => '12:00:00'],
            ['docente_id' => $docenteId, 'dia_id' => 6, 'hora_inicio' => '10:00:00', 'hora_fin' => '12:00:00'],
            ['docente_id' => $docenteId, 'dia_id' => 2, 'hora_inicio' => '14:00:00', 'hora_fin' => '18:30:00'],
            ['docente_id' => $docenteId, 'dia_id' => 4, 'hora_inicio' => '14:00:00', 'hora_fin' => '18:30:00'],
        ];

        foreach ($turnos as $turno) {
            DocenteTurno::create($turno);
        }
    }
}
