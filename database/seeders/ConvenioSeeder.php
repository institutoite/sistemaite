<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Convenio;
class ConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Convenio::create(['titulo' => 'ite familia','descripcion' =>'Planes que se acomodan a las necesidades de tu familia','foto'=>"convenios/itefamilia.jpg"]);
        Convenio::create(['titulo' => 'ite colegio','descripcion' =>'Planes que se acomodan a las necesidades de tu familia','foto'=>"convenios/itecolegio.jpg"]);
        Convenio::create(['titulo' => 'ite empresa','descripcion' =>'Planes que se acomodan a las necesidades de tu familia','foto'=>"convenios/iteempresa.jpg"]);
        Convenio::create(['titulo' => 'ite profesores','descripcion' =>'Planes que se acomodan a las necesidades de tu familia','foto'=>"convenios/itepractico.jpg"]);
        Convenio::create(['titulo' => 'ite proveedores','descripcion' =>'Planes que se acomodan a las necesidades de tu familia','foto'=>"convenios/itepractico.jpg"]);
        Convenio::create(['titulo' => 'ite empleos','descripcion' =>'Planes que se acomodan a las necesidades de tu familia','foto'=>"convenios/itepractico.jpg"]);
        Convenio::create(['titulo' => 'ite robóticas','descripcion' =>'Planes que se acomodan a las necesidades de tu familia','foto'=>"convenios/itepractico.jpg"]);
        Convenio::create(['titulo' => 'ite Emprendedores','descripcion' =>'Planes que se acomodan a las necesidades de tu familia','foto'=>"convenios/itepractico.jpg"]);
    }
}

