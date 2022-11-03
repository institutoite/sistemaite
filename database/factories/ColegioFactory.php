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
            //'nivel'=> $this->faker->randomElement(['INICIAL', 'PRIMARIA', 'SECUNDARIA','PRE-UNIVERSITARIO','UNIVERSITARIO','PROFESIONAL']),
            'turno'=> $this->faker->randomElement(['MAÑANA', 'TARDE', 'NOCHE']),
            'departamento'=> $this->faker->randomElement(["SANTA CRUZ","BENI","COCHABAMBA","CHUQUISACA"]),
            'provincia'=> $this->faker->randomElement(["ANDRES IBAÑEZ","WARNES","ICHILO"]),
            'municipio'=> $this->faker->randomElement(["COTOCA","SANTA CRUZ DE LA SIERRA","TORNO","MONTERO"]),
            'distrito'=> $this->faker->randomElement(["SEIS","DISTRITO 7","DISTRITO 8"]),
            'areageografica'=> $this->faker->randomElement(['RURAL','URBANA']),
            'coordenadax'=> $this->faker->randomFloat(),
            'coordenaday'=> $this->faker->randomFloat(),
        ];
    }
}
