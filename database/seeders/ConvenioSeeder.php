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
        Convenio::create(['titulo' => 'ite colegio','descripcion' =>'Planes especiales para colegios que tengan un convenio interinstitucional ','foto'=>"convenios/itecolegio.jpg"]);
        Convenio::create(['titulo' => 'ite empresa','descripcion' =>'Mejora los resultados de tu empresa capacitaciones para empresarios','foto'=>"convenios/iteempresa.jpg"]);
        Convenio::create(['titulo' => 'ite profesores','descripcion' =>'Muchos profesores alrededor del mundo listo para resolver tu práctico o tarea','foto'=>"convenios/iteprofesor.jpg"]);
        Convenio::create(['titulo' => 'ite empleos','descripcion' =>'Contactanos en el siguiente botón y trabaje con nostros.','foto'=>"convenios/iteempleo.jpg"]);
        Convenio::create(['titulo' => 'ite robóticas','descripcion' =>'Realizamos trabajos atumatización decoraciones led para todo tipo de edificios','foto'=>"convenios/iterobotica.jpg"]);
        Convenio::create(['titulo' => 'ite Emprendedores','descripcion' =>'Capacticiones constantes para emprendedores. Consultenos en el siguiente botón','foto'=>"convenios/iteemprendedor.jpg"]);
        Convenio::create(['titulo' => 'ite Emprendedores','descripcion' =>'Capacticiones constantes para emprendedores. Consultenos en el siguiente botón','foto'=>"convenios/iteayuda.jpg"]);

        
    }
}

