<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diretoria;

class DiretoriaSeeder extends Seeder
{
    public function run()
    {
        Diretoria::factory()->create([
            'nome' => 'Sul',
        ]);
        
        Diretoria::factory()->create([
            'nome' => 'Sudeste',
        ]);
        
        Diretoria::factory()->create([
            'nome' => 'Centro-Oeste',
        ]);
    }
}
