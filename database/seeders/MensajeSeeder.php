<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mensaje;
class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mensaje::create(['vigente'=>1,'nombre'=>'CUMPLEANIO','mensaje'=>'Feliz cumpleaños a uno de los estudiantes más especiales que he tenido el privilegio de enseñar. Creo en ti, y creo que te convertirás en una persona grande e importante en el futuro. Que todos tus sueños se hagan realidad. 🎂🎂🎂🎂🎂🎂🎂🎂']);
        Mensaje::create(['vigente'=>1,'nombre'=>'FALTAINSCRIPCION','mensaje'=>'Por medio de la presente el *INSTITUTO ITE* ,  nos ponemos en contacto con usted para hacerle indicarle que su ausencia fue notoria.%0A Le comunicamos que es importante la asistencia para obtener los objetivos que tenemos trazado para ud.%0A Le rogamos por favor que asista a clases lo esperamos en su siguiente clase.%0A Sin más por el momento, nos despedimos de usted no sin antes agradecerle su atención al presente mensaje.%0A%0A Atentamente,%0A%0A La administracion INSTITUTO ITE%0A']);
        Mensaje::create(['vigente'=>1,'nombre'=>'FALTAMATRICULACION','mensaje'=>'Por medio de la presente el *INSTITUTO ITE* ,  nos ponemos en contacto con usted para hacerle indicarle que su ausencia fue notable.%0A Le comunicamos que es importante la asistencia para obtener los objetivos que tenemos trazado para ud.%0A Le rogamos por favor que asista a clases lo esperamos en su siguiente clase.%0A Sin más por el momento, nos despedimos de usted no sin antes agradecerle su atención al presente mensaje.%0A%0A Atentamente,%0A%0A La administracion INSTITUTO ITE%0A']);
        Mensaje::create(['vigente'=>1,'nombre'=>'SALUDOGENERICO','mensaje'=>'Este mensaje es un mensaje general']);
        
        Mensaje::create(['vigente'=>1,'nombre'=>'MASIVO','mensaje'=>'Este mensaje es para enviar masivamente']);
        Mensaje::create(['vigente'=>1,'nombre'=>'FINALIZANDOINSCRIPCION','mensaje'=>'Este mensaje es para enviar al finalizar una inscripcion']);
        Mensaje::create(['vigente'=>1,'nombre'=>'FINALIZANDOMATRICULACION','mensaje'=>'Este mensaje es para enviar al finalizar una matriculacioón']);
        Mensaje::create(['vigente'=>1,'nombre'=>'EMPEZANDOINSCRIPCION','mensaje'=>'Este mensaje es para enviar al finalizar una inscripcion']);
        
        Mensaje::create(['vigente'=>1,'nombre'=>'EMPEZANDOMATRICULACION','mensaje'=>'Este mensaje es para enviar al finalizar una matriculacioón']);

        Mensaje::findOrFail(1)->usuarios()->attach(1);
        Mensaje::findOrFail(2)->usuarios()->attach(1);
        Mensaje::findOrFail(3)->usuarios()->attach(1);
        Mensaje::findOrFail(4)->usuarios()->attach(1);

        Mensaje::findOrFail(5)->usuarios()->attach(1);
        Mensaje::findOrFail(6)->usuarios()->attach(1);
        Mensaje::findOrFail(7)->usuarios()->attach(1);
        Mensaje::findOrFail(8)->usuarios()->attach(1);

        Mensaje::findOrFail(9)->usuarios()->attach(1);
    }
}



