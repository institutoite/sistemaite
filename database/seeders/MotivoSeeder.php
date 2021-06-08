<?php

namespace Database\Seeders;

use App\Models\Motivo;
use Illuminate\Database\Seeder;

class MotivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Motivo::create(['motivo'=>"tiene una tarea"]);
        Motivo::create(['motivo' => "tiene un examen"]);
        Motivo::create(['motivo' => "Se falto a clase, no le entiende"]);
        Motivo::create(['motivo' => "Tiene una defenza"]);
        Motivo::create(['motivo' => "su profe le fallo"]);
        Motivo::create(['motivo' => "En su clase no le entiende"]);
        Motivo::create(['motivo' => "Quire nivelarse"]);
        Motivo::create(['motivo' => "Quiere adelantar"]);
    }
}
