<?php

namespace Database\Factories;


use App\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'apellidop' => $this->faker->lastName,
            'apellidom' => $this->faker->lastName,
            'fechanacimiento' => '2010-05-10',
            'direccion' => $this->faker->address,
            'carnet' => $this->faker->postcode,
            'expedido' => $this->faker->numberBetween($min = 55555555, $max = 99999999),
            'genero' => "M",
            'observacion' => $this->faker->text,
            'como' => "facebook",
            'foto' => "estudiantes/foto.jpg",
            'idantiguo' => 1
        ];
    }
}
