<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DiretorGeralSeeder extends Seeder
{
    public function run()
    {
        $user = User::factory()->create([
        'name' => 'Edson A. do Nascimento',
        'email' => 'pele@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        /* assign role to user */
        $user->assignRole('Diretor Geral');
    }
}
