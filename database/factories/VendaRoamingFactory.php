<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venda;

class VendaRoamingFactory extends Factory
{
    public function definition(): array
    {
        $venda = Venda::factory()->create();
        return [
            'venda_id' => $venda->id,
            'unidade_id' => $venda->unidade_id,
        ];
    }
}
