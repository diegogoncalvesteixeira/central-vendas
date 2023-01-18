<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Unidade;

class VendedorSeeder extends Seeder
{
    public function run()
    {
        $nomes = ["Afonso Afancar", "Alceu Andreoli", "Amalia Zago", "Carlos Eduardo", "Luiz Felipe", "Breno", "Emanuel", "Ryan", "Vitor Hugo", "Yuri", "Benjamin", "Erick", "Enzo Gabriel", "Fernando", "Joaquim", "André", "Raul", "Marcelo", "Julio César", "Cauê", "Benício", "Vitor Gabriel", "Augusto", "Pedro Lucas", "Luiz Gustavo", "Giovanni", "Renato", "Diego", "João Paulo", "Renan", "Luiz Fernando", "Anthony", "Lucas Gabriel", "Thales", "Luiz Miguel", "Henry", "Marcos Vinicius", "Kevin", "Levi", "Enrico", "João Lucas", "Hugo", "Luiz Guilherme", "Matheus Henrique", "Miguel", "Davi", "Gabriel", "Arthur", "Lucas", "Matheus"];
        $emails = ["afonso.afancar@magazineaziul.com.br", "alceu.andreoli@magazineaziul.com.br", "amalia.zago@magazineaziul.com.br", "carlos.eduardo@magazineaziul.com.br", "luiz.felipe@magazineaziul.com.br", "breno@magazineaziul.com.br", "emanuel@magazineaziul.com.br", "ryan@magazineaziul.com.br", "vitor.hugo@magazineaziul.com.br", "yuri@magazineaziul.com.br", "benjamin@magazineaziul.com.br", "erick@magazineaziul.com.br", "enzo.gabriel@magazineaziul.com.br", "fernando@magazineaziul.com.br", "joaquim@magazineaziul.com.br", "andré@magazineaziul.com.br", "raul@magazineaziul.com.br", "marcelo@magazineaziul.com.br", "julio.césar@magazineaziul.com.br", "cauê@magazineaziul.com.br", "benício@magazineaziul.com.br", "vitor.gabriel@magazineaziul.com.br", "augusto@magazineaziul.com.br", "pedro.lucas@magazineaziul.com.br", "luiz.gustavo@magazineaziul.com.br", "giovanni@magazineaziul.com.br", "renato@magazineaziul.com.br", "diego@magazineaziul.com.br", "joão.paulo@magazineaziul.com.br", "renan@magazineaziul.com.br", "luiz.fernando@magazineaziul.com.br", "anthony@magazineaziul.com.br", "lucas.gabriel@magazineaziul.com.br", "thales@magazineaziul.com.br", "luiz.miguel@magazineaziul.com.br", "henry@magazineaziul.com.br", "marcos.vinicius@magazineaziul.com.br", "kevin@magazineaziul.com.br", "levi@magazineaziul.com.br", "enrico@magazineaziul.com.br", "joão.lucas@magazineaziul.com.br", "hugo@magazineaziul.com.br", "luiz.guilherme@magazineaziul.com.br", "matheus.henrique@magazineaziul.com.br", "miguel@magazineaziul.com.br", "davi@magazineaziul.com.br", "gabriel@magazineaziul.com.br", "arthur@magazineaziul.com.br", "lucas@magazineaziul.com.br", "matheus@magazineaziul.com.br"];
        $unidades = ["Belo Horizonte", "Belo Horizonte", "Belo Horizonte", "Belo Horizonte", "Belo Horizonte", "Campo Grande", "Campo Grande", "Campo Grande", "Campo Grande", "Campo Grande", "Cuiaba", "Cuiaba", "Cuiaba", "Cuiaba", "Cuiaba", "Curitiba", "Curitiba", "Curitiba", "Curitiba", "Curitiba", "Florianópolis", "Florianópolis", "Florianópolis", "Florianópolis", "Florianópolis", "Goiânia", "Goiânia", "Goiânia", "Goiânia", "Goiânia", "Porto Alegre", "Porto Alegre", "Porto Alegre", "Porto Alegre", "Porto Alegre", "Rio de Janeiro", "Rio de Janeiro", "Rio de Janeiro", "Rio de Janeiro", "Rio de Janeiro", "São Paulo", "São Paulo", "São Paulo", "São Paulo", "São Paulo", "Vitória", "Vitória", "Vitória", "Vitória", "Vitória"];
    
        $unidadesCadastradas = Unidade::get()->all();
        
        $vendedores = [];
        for ($i = 0; $i < count($nomes); $i++) {
            $id_unidade = collect($unidadesCadastradas)->where('nome', $unidades[$i])->first();
            
            $vendedores[] = [
                'nome' => $nomes[$i],
                'email' => $emails[$i],
                'unidade' => $id_unidade
            ];
        }
        
        foreach ($vendedores as $vendedor){
            $user = User::factory()->create([
                'name' => $vendedor['nome'],
                'email' => $vendedor['email'],
                'password' => bcrypt('123456'),
            ]);
            $user->assignRole('Vendedor');
            $user->unidades()->attach($vendedor['unidade']);
        }
    }
}
