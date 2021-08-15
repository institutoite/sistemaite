<?php

namespace Database\Factories;

use App\Models\Colegio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColegioFactory extends Factory
{

    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Colegio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>"Colegio". $this->faker->numberBetween($min = 1, $max = 250),
            'rue'=> $this->faker->numberBetween($min = 555555, $max = 999999),
            'director'=>$this->faker->name,
            'direccion'=> $this->faker->address,
            'telefono'=>"3326545",
            'celular'=>"78789898",
            'dependencia'=> $this->faker->randomElement(['FISCAL','PARTICULAR','CONVENIO']),
            'nivel'=> $this->faker->randomElement(['INICIAL', 'PRIMARIA', 'SECUNDARIA','PRE-UNIVERSITARIO','UNIVERSITARIO','PROFESIONAL']),
            'turno'=> $this->faker->randomElement(['MAÑANA', 'TARDE', 'NOCHE']),
            'departamento_id'=> $this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'provincia_id'=> $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'municipio_id'=> $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'distrito'=> $this->faker->randomElement([1, 2, 3, 4]),
            'areageografica'=> $this->faker->randomElement(['RURAL','URBANA']),
            'coordenadax'=> $this->faker->randomFloat(),
            'coordenaday'=> $this->faker->randomFloat(),
        ];
    }
}
