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
        Mensaje::create(['vigente'=>1,'nombre'=>'cumpleaños','mensaje'=>'Feliz cumpleaños a uno de los estudiantes más especiales que he tenido el privilegio de enseñar. Creo en ti, y creo que te convertirás en una persona grande e importante en el futuro. Que todos tus sueños se hagan realidad. 🎂🎂🎂🎂🎂🎂🎂🎂']);
        Mensaje::create(['vigente'=>1,'nombre'=>'faltones clases','mensaje'=>'Por medio de la presente el *INSTITUTO ITE* ,  nos ponemos en contacto con usted para hacerle indicarle que su ausencia fue notoria.%0A Le comunicamos que es importante la asistencia para obtener los objetivos que tenemos trazado para ud.%0A Le rogamos por favor que asista a clases lo esperamos en su siguiente clase.%0A Sin más por el momento, nos despedimos de usted no sin antes agradecerle su atención al presente mensaje.%0A%0A Atentamente,%0A%0A La administracion INSTITUTO ITE%0A']);
        Mensaje::create(['vigente'=>1,'nombre'=>'faltones computacion','mensaje'=>'Por medio de la presente el *INSTITUTO ITE* ,  nos ponemos en contacto con usted para hacerle indicarle que su ausencia fue notable.%0A Le comunicamos que es importante la asistencia para obtener los objetivos que tenemos trazado para ud.%0A Le rogamos por favor que asista a clases lo esperamos en su siguiente clase.%0A Sin más por el momento, nos despedimos de usted no sin antes agradecerle su atención al presente mensaje.%0A%0A Atentamente,%0A%0A La administracion INSTITUTO ITE%0A']);
        Mensaje::create(['vigente'=>1,'nombre'=>'saludo generico','mensaje'=>'Mensaje otro']);
        Mensaje::create(['vigente'=>1,'nombre'=>'mensaje masivo','mensaje'=>'Mensaje otro']);
    }
}
