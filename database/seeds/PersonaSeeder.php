<?php

use Illuminate\Database\Seeder;
use App\Persona;
class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Persona::class, 50)->create();
    }
}
