<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
        $user = new User();
        $user->name = 'david';
        $user->email = 'adonias@ite.com.bo';
        $user->password = Hash::make('123456789');
        $user->foto = Str::random(10);
        $user->save();

        User::factory()->count(10)->create();
    }
}


