<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Diretor Geral']);
        Role::create(['name' => 'Diretor']);
        Role::create(['name' => 'Gerente']);
        Role::create(['name' => 'Vendedor']);
    }
}
