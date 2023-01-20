<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use App\Models\Unidade;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(DiretoriaSeeder::class);
        $this->call(UnidadeSeeder::class);
        $this->call(DiretorGeralSeeder::class);
        $this->call(DiretorSeeder::class);
        $this->call(GerenteSeeder::class);
        $this->call(VendedorSeeder::class);
    }
}
