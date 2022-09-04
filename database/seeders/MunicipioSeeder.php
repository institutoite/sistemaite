<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipio;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // %%%%%%%%%%%%%%%%%%%%%%%%%%%% MUNICIPIOS DE SANTA CRUZ %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        Municipio::create(['municipio' => 'Ascensión de Guarayos', 'provincia_id' => 7]);
        Municipio::create(['municipio' => 'Boyuibe', 'provincia_id' => 4]);
        Municipio::create(['municipio' => 'Buena Vista', 'provincia_id' => 8]);
        Municipio::create(['municipio' => 'Cabezas', 'provincia_id' => 4]);
        Municipio::create(['municipio' => 'Camiri', 'provincia_id' => 4]);
        Municipio::create(['municipio' => 'Charagua', 'provincia_id' => 4]);
        Municipio::create(['municipio' => 'Colpa Bélgica', 'provincia_id' => 14]);
        Municipio::create(['municipio' => 'Comarapa', 'provincia_id' => 11]);
        Municipio::create(['municipio' => 'Concepción', 'provincia_id' => 12]);
        Municipio::create(['municipio' => 'Cotoca', 'provincia_id' => 1]);
        Municipio::create(['municipio' => 'Cuatro Cañadas', 'provincia_id' => 12]);
        Municipio::create(['municipio' => 'Cuevo', 'provincia_id' => 4]);
        Municipio::create(['municipio' => 'El Carmen Rivero Tórrez', 'provincia_id' => 6]);
        Municipio::create(['municipio' => 'El Puente', 'provincia_id' => 7]);
        Municipio::create(['municipio' => 'El Torno', 'provincia_id' => 1]);
        Municipio::create(['municipio' => 'El Trigal', 'provincia_id' => 15]);
        Municipio::create(['municipio' => 'Fernández Alonso', 'provincia_id' => 13]);
        Municipio::create(['municipio' => 'General Saavedra', 'provincia_id' => 13]);
        Municipio::create(['municipio' => 'Gutiérrez', 'provincia_id' => 4]);
        Municipio::create(['municipio' => 'La Guardia', 'provincia_id' => 1]);
        Municipio::create(['municipio' => 'Lagunillas', 'provincia_id' => 4]);
        Municipio::create(['municipio' => 'Mairana', 'provincia_id' => 5]);
        Municipio::create(['municipio' => 'Mineros', 'provincia_id' => 13]);
        Municipio::create(['municipio' => 'Montero', 'provincia_id' => 13]);
        Municipio::create(['municipio' => 'Moro Moro', 'provincia_id' => 15]);
        Municipio::create(['municipio' => 'Okinawa Uno', 'provincia_id' => 9]);
        Municipio::create(['municipio' => 'Pailón', 'provincia_id' => 3]);
        Municipio::create(['municipio' => 'Pampagrande', 'provincia_id' => 5]);
        Municipio::create(['municipio' => 'Porongo', 'provincia_id' => 1]);
        Municipio::create(['municipio' => 'Portachuelo', 'provincia_id' => 14]);
        Municipio::create(['municipio' => 'Postrervalle', 'provincia_id' => 15]);
        Municipio::create(['municipio' => 'Pucará', 'provincia_id' => 15]);
        Municipio::create(['municipio' => 'Puerto Quijarro', 'provincia_id' => 6]);
        Municipio::create(['municipio' => 'Puerto Suárez', 'provincia_id' => 6]);
        Municipio::create(['municipio' => 'Quirusillas', 'provincia_id' => 5]);
        Municipio::create(['municipio' => 'Roboré', 'provincia_id' => 3]);
        Municipio::create(['municipio' => 'Saipina', 'provincia_id' => 11]);
        Municipio::create(['municipio' => 'Samaipata', 'provincia_id' => 5]);
        Municipio::create(['municipio' => 'San Antonio de Lomerío', 'provincia_id' => 12]);
        Municipio::create(['municipio' => 'San Carlos', 'provincia_id' => 8]);
        Municipio::create(['municipio' => 'San Ignacio de Velasco', 'provincia_id' => 10]);
        Municipio::create(['municipio' => 'San Javier', 'provincia_id' => 12]);
        Municipio::create(['municipio' => 'San José de Chiquitos', 'provincia_id' => 3]);
        Municipio::create(['municipio' => 'San Juan de Yapacaní', 'provincia_id' => 8]);
        Municipio::create(['municipio' => 'San Julián', 'provincia_id' => 12]);
        Municipio::create(['municipio' => 'San Matías', 'provincia_id' => 2]);
        Municipio::create(['municipio' => 'San Miguel de Velasco', 'provincia_id' => 10]);
        Municipio::create(['municipio' => 'San Pedro', 'provincia_id' => 13]);
        Municipio::create(['municipio' => 'San Rafael de Velasco', 'provincia_id' => 10]);
        Municipio::create(['municipio' => 'San Ramón', 'provincia_id' => 12]);
        Municipio::create(['municipio' => 'Santa Cruz de la Sierra', 'provincia_id' => 1]);
        Municipio::create(['municipio' => 'Santa Rosa del Sara', 'provincia_id' => 14]);
        Municipio::create(['municipio' => 'Urubichá', 'provincia_id' => 7]);
        Municipio::create(['municipio' => 'Vallegrande', 'provincia_id' => 15]);
        Municipio::create(['municipio' => 'Warnes', 'provincia_id' => 9]);
        Municipio::create(['municipio' => 'Yapacaní', 'provincia_id' => 8]);

        Municipio::find(1)->usuarios()->attach(1);
        Municipio::find(2)->usuarios()->attach(1);
        Municipio::find(3)->usuarios()->attach(1);
        Municipio::find(4)->usuarios()->attach(1);
        Municipio::find(5)->usuarios()->attach(1);
        Municipio::find(6)->usuarios()->attach(1);
        Municipio::find(7)->usuarios()->attach(1);
        Municipio::find(8)->usuarios()->attach(1);
        Municipio::find(9)->usuarios()->attach(1);

        Municipio::find(10)->usuarios()->attach(1);
        Municipio::find(11)->usuarios()->attach(1);
        Municipio::find(12)->usuarios()->attach(1);
        Municipio::find(13)->usuarios()->attach(1);
        Municipio::find(14)->usuarios()->attach(1);
        Municipio::find(15)->usuarios()->attach(1);
        Municipio::find(16)->usuarios()->attach(1);
        Municipio::find(17)->usuarios()->attach(1);
        Municipio::find(18)->usuarios()->attach(1);
        Municipio::find(19)->usuarios()->attach(1);

        Municipio::find(20)->usuarios()->attach(1);
        Municipio::find(21)->usuarios()->attach(1);
        Municipio::find(22)->usuarios()->attach(1);
        Municipio::find(23)->usuarios()->attach(1);
        Municipio::find(24)->usuarios()->attach(1);
        Municipio::find(25)->usuarios()->attach(1);
        Municipio::find(26)->usuarios()->attach(1);
        Municipio::find(27)->usuarios()->attach(1);
        Municipio::find(28)->usuarios()->attach(1);
        Municipio::find(29)->usuarios()->attach(1);

        Municipio::find(30)->usuarios()->attach(1);
        Municipio::find(31)->usuarios()->attach(1);
        Municipio::find(32)->usuarios()->attach(1);
        Municipio::find(33)->usuarios()->attach(1);
        Municipio::find(34)->usuarios()->attach(1);
        Municipio::find(35)->usuarios()->attach(1);
        Municipio::find(36)->usuarios()->attach(1);
        Municipio::find(37)->usuarios()->attach(1);
        Municipio::find(38)->usuarios()->attach(1);
        Municipio::find(39)->usuarios()->attach(1);

        Municipio::find(40)->usuarios()->attach(1);
        Municipio::find(41)->usuarios()->attach(1);
        Municipio::find(42)->usuarios()->attach(1);
        Municipio::find(43)->usuarios()->attach(1);
        Municipio::find(44)->usuarios()->attach(1);
        Municipio::find(45)->usuarios()->attach(1);
        Municipio::find(46)->usuarios()->attach(1);
        Municipio::find(47)->usuarios()->attach(1);
        Municipio::find(48)->usuarios()->attach(1);
        Municipio::find(49)->usuarios()->attach(1);

        Municipio::find(50)->usuarios()->attach(1);
        Municipio::find(51)->usuarios()->attach(1);
        Municipio::find(52)->usuarios()->attach(1);
        Municipio::find(53)->usuarios()->attach(1);
        Municipio::find(54)->usuarios()->attach(1);
        Municipio::find(55)->usuarios()->attach(1);
        Municipio::find(56)->usuarios()->attach(1);
    }
}
