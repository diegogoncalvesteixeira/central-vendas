<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DiretorSeeder extends Seeder
{
    public function run()
    {
        //cria usuario para Diretor
        $user = User::factory()->create([
        'name' => 'Vagner Mancini',
        'email' => 'vagner.mancini@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como diretor
        $user->assignRole('Diretor');
        
        //adiciona usuario a diretoria sul
        $user->diretorias()->attach(1);
    
        //cria usuario para Diretor
        $user = User::factory()->create([
        'name' => 'Abel Ferreira',
        'email' => 'abel.ferreira@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como diretor
        $user->assignRole('Diretor');
        
        //adiciona usuario a diretoria Sudeste
        $user->diretorias()->attach(2);
    
        //cria usuario para Diretor
        $user = User::factory()->create([
        'name' => 'Rogerio Ceni',
        'email' => 'rogerio.ceni@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como diretor
        $user->assignRole('Diretor');
        
        //adiciona usuario a diretoria Centro-Oeste
        $user->diretorias()->attach(3);
    }
}
