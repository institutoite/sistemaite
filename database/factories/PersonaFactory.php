<?php

namespace Database\Factories;


use App\Models\Persona;
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
            'nombre' => $this->faker->name(),
            'apellidop' => $this->faker->lastName(),
            'apellidom' => $this->faker->lastName(),
            'fechanacimiento' => '15-05-2015',
            'direccion' => $this->faker->address(),
            'carnet' =>$this->faker->numberBetween($min = 55555555, $max = 99999999),
            'expedido' =>$this->faker->randomElement(['BEN', 'SCZ','LPZ','CBBA','TAR','PND','ORU','POT','CHU']),
            'genero' =>$this->faker->randomElement(['MUJER','HOMBRE']),
            'pais_id'=>1,
            'ciudad_id'=>6,
            'zona_id'=>1,
            'como' => "FACEBOOK",
            'foto' => "estudiantes/foto.jpg",
            'papelinicial'=> $this->faker->randomElement(['estudiante']),
        ];
    }
}
