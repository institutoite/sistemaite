<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PersonaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(CiudadSeeder::class);
    }
}
