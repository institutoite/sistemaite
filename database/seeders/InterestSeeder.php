<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Interest;
class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interest::create(['interest'=>'Inicial','descripcion'=>"Deja en nuestras la formacion academica de los que mas quieres"]);
        Interest::create(['interest'=>'Primaria','descripcion'=>"La ectura, escritura y las operaciones básicas son fundamentales"]);
        Interest::create(['interest'=>'Guardería','descripcion'=>"Cuidamos y educamos desde los dos años"]);
        Interest::create(['interest'=>'Secundaria','descripcion'=>"No pares de aprender, y descrubre tu nueva versión"]);
        Interest::create(['interest'=>'Bachilleres','descripcion'=>"Estudia carreras cortas y con amplia oportunidad laboral"]);
        Interest::create(['interest'=>'PSA-UAGRM','descripcion'=>"Elige tu carrera y no pares de aprender"]);
        Interest::create(['interest'=>'CUP-UAGRM','descripcion'=>"Reforzamos tus conocimientos según tu necesidad"]);
        
        Interest::create(['interest'=>'Universitario','descripcion'=>"Perfecciona tu conocimiento en el area de mayor interes para ti"]);
        Interest::create(['interest'=>'Robótica','descripcion'=>"Aprende sin límites. Descubre y materializa tus ideas"]);
        Interest::create(['interest'=>'Computación','descripcion'=>"Aprende computación desde cero hasta avanzado"]);
        Interest::create(['interest'=>'Diseño-Gráfico','descripcion'=>"Vectoriza, armoniza tus ideas y muestrale al mundo tu creatividad"]);
        Interest::create(['interest'=>'Programación','descripcion'=>"Aprende a programar aplicaciones web y móviles desde cero hasta avanzado"]);
        
        Interest::create(['interest'=>'Copia e Impresión','descripcion'=>"Ya no vayas a la universidad,Copias e impresiones desde 9 centavos "]);
        Interest::create(['interest'=>'Prácticos','descripcion'=>"Pon tu precio, te ayudamos con tus tareas y prácticos"]);
        Interest::create(['interest'=>'Videobooth','descripcion'=>"Fabricamos, vendemos y alquilamos videobooth 360 personalizados"]);
        Interest::create(['interest'=>'Desarrollo-App-Movil','descripcion'=>"Aprende y crea la apliación que quieras."]);
        Interest::create(['interest'=>'Desarrollo-App-Web','descripcion'=>"Elige la tecnología y Crea aplicaciones Webs profesionales"]);
        Interest::create(['interest'=>'Experimentos','descripcion'=>"Asesoramos tu esperimento, descubre la el poder de la ciencia"]);


        Interest::findOrFail(1)->usuarios()->attach(1);
        Interest::findOrFail(2)->usuarios()->attach(1);
        Interest::findOrFail(3)->usuarios()->attach(1);
        Interest::findOrFail(4)->usuarios()->attach(1);
        Interest::findOrFail(5)->usuarios()->attach(1);

        Interest::findOrFail(6)->usuarios()->attach(1);
        Interest::findOrFail(7)->usuarios()->attach(1);
        Interest::findOrFail(8)->usuarios()->attach(1);
        Interest::findOrFail(9)->usuarios()->attach(1);
        Interest::findOrFail(10)->usuarios()->attach(1);

        Interest::findOrFail(11)->usuarios()->attach(1);
        Interest::findOrFail(12)->usuarios()->attach(1);
        Interest::findOrFail(13)->usuarios()->attach(1);
        Interest::findOrFail(14)->usuarios()->attach(1);
        Interest::findOrFail(15)->usuarios()->attach(1);
        Interest::findOrFail(16)->usuarios()->attach(1);
        
    }
}
