<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Como;
class ComoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Como::create(['como'=>"PASANDO"]);
        Como::create(['como'=>"REFERENCIA"]);
        Como::create(['como'=>"LETREROS"]);
        Como::create(['como'=>"GOOGLE"]);
        Como::create(['como'=>"YOUTUBE"]);
        
        Como::create(['como'=>"PAGINAWEB"]);
        Como::create(['como'=>"FACEBOOK"]);
        Como::create(['como'=>"WHATSAPP"]);
        Como::create(['como'=>"TELEGRAM"]);
        Como::create(['como'=>"PUBLICIDAD"]);
        Como::create(['como'=>"OTRO"]);

       
        

    }
}
