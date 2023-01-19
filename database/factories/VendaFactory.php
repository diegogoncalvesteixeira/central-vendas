<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Unidade;

class VendaFactory extends Factory
{
    public function definition(): array
    {
        $user = User::whereHas('roles', function($q){
            $q->where('name', 'Vendedor');
        })->first();
        $user->unidades()->attach(Unidade::first()->id);
        
        return [
            'user_id' => $user->id,
            'unidade_id' => Unidade::first()->id,
            'latitude_longitude' => $this->faker->latitude . ', ' . $this->faker->longitude,
            'data_hora_venda' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'valor_total' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
