<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(['departamento' => 'SANTA CRUZ']);
        Departamento::create(['departamento' => 'LA PAZ']);
        Departamento::create(['departamento' => 'COCHABAMBA']);
        Departamento::create(['departamento' => 'CHUQUISACA']);
        Departamento::create(['departamento' => 'TARIJA']);
        Departamento::create(['departamento' => 'ORURO']);
        Departamento::create(['departamento' => 'POTOSI']);
        Departamento::create(['departamento' => 'BENI']);
        Departamento::create(['departamento' => 'PANDO']);

    }
}
