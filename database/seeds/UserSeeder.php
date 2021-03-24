<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create(); 
        DB::table('users')->insert([
            'name' => "david",
            'email' => 'david@ite.com.bo',
            'email_verified_at' => now(),
            'password' => '123456789', // password
            'remember_token' => Str::random(10),
        ]);

        

    }
}
