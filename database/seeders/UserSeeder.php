<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Zona;
use App\Models\Pais;
use App\Models\Persona;
use App\Models\Observacion;
use App\Models\Userable;

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
        $user->email = 'informaciones.ite@gmail.com';
        $user->persona_id = 1;
        $user->password = Hash::make('*educabol1326*');
        $user->foto = "estudiantes/foto.jpg";
        $user->save();

        //User::factory()->count(10)->create();
        

       /* Userable::create(["user_id"=>1,"userable_id"=>1,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>2,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>3,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>4,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>5,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>6,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>7,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>8,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>9,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>10,"userable_type"=>"App\Models\Ciudad"]);
        
        Userable::create(["user_id"=>1,"userable_id"=>21,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>22,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>23,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>24,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>25,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>26,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>27,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>28,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>29,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>20,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>31,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>32,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>33,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>34,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>35,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>36,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>37,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>38,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>39,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>30,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>41,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>42,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>43,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>44,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>45,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>46,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>47,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>48,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>49,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>40,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>51,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>52,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>53,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>54,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>55,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>56,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>57,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>58,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>59,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>50,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>61,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>62,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>63,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>64,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>65,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>66,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>67,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>68,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>69,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>60,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>71,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>72,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>73,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>74,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>75,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>76,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>77,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>78,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>79,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>70,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>81,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>82,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>83,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>84,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>85,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>86,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>87,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>88,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>89,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>80,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>91,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>92,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>93,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>94,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>95,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>96,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>97,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>98,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>99,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>90,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>101,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>102,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>103,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>104,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>105,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>106,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>107,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>108,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>109,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>100,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>111,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>112,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>113,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>114,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>115,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>116,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>117,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>118,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>119,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>110,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>121,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>122,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>123,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>124,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>125,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>126,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>127,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>128,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>129,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>120,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>131,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>132,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>133,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>134,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>135,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>136,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>137,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>138,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>139,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>130,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>141,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>142,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>143,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>144,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>145,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>146,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>147,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>148,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>149,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>140,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>151,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>152,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>153,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>154,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>155,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>156,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>157,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>158,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>159,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>150,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>161,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>162,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>163,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>164,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>165,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>166,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>167,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>168,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>169,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>160,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>171,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>172,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>173,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>174,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>175,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>176,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>177,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>178,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>179,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>170,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>181,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>182,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>183,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>184,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>185,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>186,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>187,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>188,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>189,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>180,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>191,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>192,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>193,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>194,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>195,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>196,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>197,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>198,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>199,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>190,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>201,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>202,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>203,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>204,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>205,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>206,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>207,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>208,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>209,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>200,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>211,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>212,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>213,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>214,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>215,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>216,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>217,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>218,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>219,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>210,"userable_type"=>"App\Models\Ciudad"]);
 
        Userable::create(["user_id"=>1,"userable_id"=>221,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>222,"userable_type"=>"App\Models\Ciudad"]);
        Userable::create(["user_id"=>1,"userable_id"=>223,"userable_type"=>"App\Models\Ciudad"]);
        
        
        Userable::create(["user_id"=>1,"userable_id"=>1,"userable_type"=>"App\Models\Persona"]);*/

       
       


        
    }
}


