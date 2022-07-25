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

        // %%%%%%%%%%%%%%%%%%%%%%%%%%%% MUNICIPIOS DE SANTA CRUZ %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        // Municipio::findOrFail(1)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(2)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(3)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(4)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(5)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(6)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(7)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(8)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(9)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(10)->userable()->create(['user_id'=>1]);

        // Municipio::findOrFail(11)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(12)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(13)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(14)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(15)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(16)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(17)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(18)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(19)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(20)->userable()->create(['user_id'=>1]);

        // Municipio::findOrFail(21)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(22)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(23)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(24)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(25)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(26)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(27)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(28)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(29)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(30)->userable()->create(['user_id'=>1]);

        // Municipio::findOrFail(31)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(32)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(33)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(34)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(35)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(36)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(37)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(38)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(39)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(40)->userable()->create(['user_id'=>1]);

        // Municipio::findOrFail(41)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(42)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(43)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(44)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(45)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(46)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(47)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(48)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(49)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(50)->userable()->create(['user_id'=>1]);

        // Municipio::findOrFail(51)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(52)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(53)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(54)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(55)->userable()->create(['user_id'=>1]);
        // Municipio::findOrFail(56)->userable()->create(['user_id'=>1]);
    }
}
