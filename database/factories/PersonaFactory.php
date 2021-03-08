<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persona;
use Faker\Generator as Faker;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->name,
        'apellidop'=> $faker->lastName,
        'apellidom'=> $faker->lastName,
        'fechanacimiento'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'direccion'=> $faker->address,
        'carnet'=> $faker->postcode,
        'expedido'=>$faker->numberBetween($min = 55555555, $max = 99999999),
        'genero'=>"M",
        'observacion'=> $faker->text,
        'foto'=> "foto.jpg",
        
        'idantiguo'=> $faker->numberBetween($min = 1, $max = 6000)
    ];
});
