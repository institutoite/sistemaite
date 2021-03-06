<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

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
        $user->name = 'David';
        $user->email = 'adonias@ite.com.bo';
        $user->password = Hash::make('123456789');
        $user->foto = "estudiantes/foto.jpg";
        $user->save();

        //User::factory()->count(10)->create();
    }
}


