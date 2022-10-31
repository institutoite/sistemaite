<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Persona;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evento::create(['evento' =>"Vacacionaes invernales 2022",'seleccionado'=>0]);
        Evento::create(['evento' =>"Nuevo sistema",'seleccionado'=>0]);
        Evento::create(['evento' =>"Plataforma educativa",'seleccionado'=>0]);
        Evento::create(['evento' =>"Aplicacion Movil",'seleccionado'=>0]);
        Evento::create(['evento' =>"Vacaciones verano 2022",'seleccionado'=>0]);
        
        Evento::findOrFail(1)->usuarios()->attach(1);
        Evento::findOrFail(2)->usuarios()->attach(1);
        Evento::findOrFail(3)->usuarios()->attach(1);
        Evento::findOrFail(4)->usuarios()->attach(1);
        Evento::findOrFail(5)->usuarios()->attach(1);

        Persona::findOrFail(1)->usuarios()->attach(1);
        Persona::findOrFail(2)->usuarios()->attach(1);
        Persona::findOrFail(3)->usuarios()->attach(1);
        Persona::findOrFail(4)->usuarios()->attach(1);
        Persona::findOrFail(5)->usuarios()->attach(1);
        Persona::findOrFail(6)->usuarios()->attach(1);
        Persona::findOrFail(7)->usuarios()->attach(1);
        Persona::findOrFail(8)->usuarios()->attach(1);
        Persona::findOrFail(9)->usuarios()->attach(1);
        Persona::findOrFail(10)->usuarios()->attach(1);
        Persona::findOrFail(11)->usuarios()->attach(1);
        Persona::findOrFail(12)->usuarios()->attach(1);
        Persona::findOrFail(13)->usuarios()->attach(1);
        Persona::findOrFail(14)->usuarios()->attach(1);
    }
}
