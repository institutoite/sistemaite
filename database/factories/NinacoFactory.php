<?php

namespace Database\Factories;

use App\Models\Ninaco;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NinacoFactory extends Factory
{
    protected $model = Ninaco::class;

    public function definition()
    {
        return [
			'persona_id' => $this->faker->name,
        ];
    }
}
