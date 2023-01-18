<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Diretoria;

class UnidadeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'diretoria_id' => Diretoria::factory(),
            'lat_long' => $this->faker->latitude . ',' . $this->faker->longitude,
        ];
    }
}
