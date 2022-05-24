<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Pais;

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
        $user->persona_id = 1;
        $user->password = Hash::make('123456789');
        $user->foto = "estudiantes/foto.jpg";
        $user->save();

        //User::factory()->count(10)->create();
        Pais::findOrFail(1)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(2)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(3)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(4)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(5)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(6)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(7)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(8)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(9)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(10)->userable()->create(['user_id'=>1]);
        
        Pais::findOrFail(11)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(12)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(13)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(14)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(15)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(16)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(17)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(18)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(19)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(20)->userable()->create(['user_id'=>1]);
        
        Pais::findOrFail(21)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(22)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(23)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(24)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(25)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(26)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(27)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(28)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(29)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(30)->userable()->create(['user_id'=>1]);
     
        Pais::findOrFail(31)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(32)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(33)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(34)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(35)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(36)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(37)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(38)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(39)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(40)->userable()->create(['user_id'=>1]);
        
        Pais::findOrFail(41)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(42)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(43)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(44)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(45)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(46)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(47)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(48)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(49)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(50)->userable()->create(['user_id'=>1]);
        
        Pais::findOrFail(51)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(52)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(53)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(54)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(55)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(56)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(57)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(58)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(59)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(60)->userable()->create(['user_id'=>1]);

     
        Pais::findOrFail(61)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(62)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(63)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(64)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(65)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(66)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(67)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(68)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(69)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(70)->userable()->create(['user_id'=>1]);

     
        Pais::findOrFail(71)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(72)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(73)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(74)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(75)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(76)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(77)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(78)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(79)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(80)->userable()->create(['user_id'=>1]);

     
        Pais::findOrFail(81)->userable()->create(['user_id'=>1]);
        Pais::findOrFail(82)->userable()->create(['user_id'=>1]);
    }
}


