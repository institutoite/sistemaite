<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(['departamento' => 'SANTA CRUZ','pais_id'=>1]);
        Departamento::create(['departamento' => 'LA PAZ','pais_id'=>1]);
        Departamento::create(['departamento' => 'COCHABAMBA','pais_id'=>1]);
     
        Departamento::create(['departamento' => 'CHUQUISACA','pais_id'=>1]);
        Departamento::create(['departamento' => 'TARIJA','pais_id'=>1]);
        Departamento::create(['departamento' => 'ORURO','pais_id'=>1]);
     
        Departamento::create(['departamento' => 'POTOSI','pais_id'=>1]);
        Departamento::create(['departamento' => 'BENI','pais_id'=>1]);
        Departamento::create(['departamento' => 'PANDO','pais_id'=>1]);
        
        
    }
}
