<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class GerenteSeeder extends Seeder
{
    public function run()
    {
        //cria usuario para gerente
        $user = User::factory()->create([
        'name' => 'Ronaldinho Gaucho',
        'email' => 'ronaldinho.gaucho@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
        
        //coloca usuario como gerente
        $user->assignRole('Gerente');
    
        //adiciona usuario a diretoria 1
        $user->diretorias()->attach(1);
        
        //adiciona usuario a unidade 1
        $user->unidades()->attach(1);
    
    
        //cria usuario para gerente
        $user = User::factory()->create([
        'name' => 'Roberto Firmino',
        'email' => 'roberto.firmino@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como gerente
        $user->assignRole('Gerente');
    
        //adiciona usuario a diretoria 1
        $user->diretorias()->attach(1);
    
        //adiciona usuario a unidade 1
        $user->unidades()->attach(2);
    
        //cria usuario para gerente
        $user = User::factory()->create([
        'name' => 'Alex de Souza',
        'email' => 'alex.de.souza@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como gerente
        $user->assignRole('Gerente');
    
        //adiciona usuario a diretoria 1
        $user->diretorias()->attach(1);
    
        //adiciona usuario a unidade 1
        $user->unidades()->attach(3);
    
        //cria usuario para gerente
        $user = User::factory()->create([
        'name' => 'Françoaldo Souza',
        'email' => 'françoaldo.souza@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como gerente
        $user->assignRole('Gerente');
    
        //adiciona usuario a diretoria 1
        $user->diretorias()->attach(2);
    
        //adiciona usuario a unidade 1
        $user->unidades()->attach(4);
    
    
    
        //cria usuario para gerente
        $user = User::factory()->create([
        'name' => 'Romário Faria',
        'email' => 'romário.faria@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como gerente
        $user->assignRole('Gerente');
    
        //adiciona usuario a diretoria 1
        $user->diretorias()->attach(2);
    
        //adiciona usuario a unidade 1
        $user->unidades()->attach(5);
    
    
        //cria usuario para gerente
        $user = User::factory()->create([
        'name' => 'Ricardo Goulart',
        'email' => 'ricardo.goulart@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como gerente
        $user->assignRole('Gerente');
    
        //adiciona usuario a diretoria 1
        $user->diretorias()->attach(2);
    
        //adiciona usuario a unidade 1
        $user->unidades()->attach(6);
    
    
    
        //cria usuario para gerente
        $user = User::factory()->create([
        'name' => 'Dejan Petkovic',
        'email' => 'dejan.petkovic@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como gerente
        $user->assignRole('Gerente');
    
        //adiciona usuario a diretoria 1
        $user->diretorias()->attach(2);
    
        //adiciona usuario a unidade 1
        $user->unidades()->attach(7);
    
        
    
        //cria usuario para gerente
        $user = User::factory()->create([
        'name' => 'Deyverson Acosta',
        'email' => 'deyverson.acosta@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como gerente
        $user->assignRole('Gerente');
    
        //adiciona usuario a diretoria 1
        $user->diretorias()->attach(3);
    
        //adiciona usuario a unidade 1
        $user->unidades()->attach(8);
        
        
        
    
        //cria usuario para gerente
        $user = User::factory()->create([
        'name' => 'Harlei Silva',
        'email' => 'harlei.silva@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como gerente
        $user->assignRole('Gerente');
    
        //adiciona usuario a diretoria 1
        $user->diretorias()->attach(3);
    
        //adiciona usuario a unidade 1
        $user->unidades()->attach(9);
    
    
        //cria usuario para gerente
        $user = User::factory()->create([
        'name' => 'Walter Henrique',
        'email' => 'walter.henrique@magazineaziul.com.br',
        'password' => bcrypt('123mudar'), // password
        ]);
    
        //coloca usuario como gerente
        $user->assignRole('Gerente');
    
        //adiciona usuario a diretoria 1
        $user->diretorias()->attach(3);
    
        //adiciona usuario a unidade 1
        $user->unidades()->attach(10);
    
    }
}
