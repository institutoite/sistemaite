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
        Convenio::create(['titulo' => 'IFE familia','descripcion' =>'Planes que se acomodan a las necesidades de tu familia','foto'=>"convenios/ifefamilia.jpg"]);
        Convenio::create(['titulo' => 'IFE colegio','descripcion' =>'Planes especiales para colegios que tengan un convenio interinstitucional ','foto'=>"convenios/ifecolegio.jpg"]);
        Convenio::create(['titulo' => 'IFE empresa','descripcion' =>'Mejora los resultados de tu empresa capacitaciones para empresarios','foto'=>"convenios/ifeempresa.jpg"]);
        Convenio::create(['titulo' => 'IFE profesores','descripcion' =>'Muchos profesores alrededor del mundo listo para resolver tu práctico o tarea','foto'=>"convenios/ifeprofesor.jpg"]);
        Convenio::create(['titulo' => 'IFE empleos','descripcion' =>'Contactanos en el siguiente botón y trabaje con nostros.','foto'=>"convenios/ifeempleo.jpg"]);
        Convenio::create(['titulo' => 'IFE robóticas','descripcion' =>'Realizamos trabajos atumatización decoraciones led para todo tipo de edificios','foto'=>"convenios/iferobotica.jpg"]);
        Convenio::create(['titulo' => 'IFE Emprendedores','descripcion' =>'Capacticiones constantes para emprendedores. Consultenos en el siguiente botón','foto'=>"convenios/ifeemprendedor.jpg"]);
        Convenio::create(['titulo' => 'IFE Emprendedores','descripcion' =>'Capacticiones constantes para emprendedores. Consultenos en el siguiente botón','foto'=>"convenios/ifeayuda.jpg"]);

        
    }
}

