<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Venda;

class VendaTest extends TestCase
{
    use withFaker, DatabaseTransactions;
    
    public function test_cadastro_venda(){
        $vendedor = User::whereHas('roles', function($q){
            $q->where('name', 'Vendedor');
        })->first();
        
        $response = $this->post('/api/login', [
            'email' => $vendedor->email,
            'password' => '123mudar'
        ]);
        
        $content = json_decode($response->getContent());
        $token = $content->authorization->token;
        
        $response = $this->post('/api/vendas/cadastro', [
            'vendedor_id' => $vendedor->id,
            'latitude_longitude' => '-30.048750057541955, -51.228587422990806',
            'data_hora_venda' => now(),
            'valor_total' => $this->faker->randomFloat(2, 0, 1000),
        ], [
            'Authorization' => 'Bearer ' . $token
        ]);
        
        $response->assertStatus(200);
        
        $content = json_decode($response->getContent());
        $this->assertObjectHasAttribute('status', $content);
        $this->assertObjectHasAttribute('message', $content);
        $this->assertEquals('Venda realizada com sucesso', $content->message);
        
        $venda = Venda::latest()->first();
        $this->assertDatabaseHas(Venda::class, [
            'id' => $venda->id,
            'user_id' => $venda->user_id,
            'latitude_longitude' => $venda->latitude_longitude,
            'data_hora_venda' => $venda->data_hora_venda,
            'valor_total' => $venda->valor_total,
        ]);
    }
    
    public function test_detalhes_venda(){
        $diretor_geral = User::whereHas('roles', function($q){
            $q->where('name', 'Diretor Geral');
        })->first();
    
        $response = $this->post('/api/login', [
        'email' => $diretor_geral->email,
        'password' => '123mudar'
        ]);
    
        $content = json_decode($response->getContent());
        $token = $content->authorization->token;
        
        $venda = Venda::factory()->create();
        $response = $this->get('/api/vendas/detalhes/' . $venda->id,[
            'Authorization' => 'Bearer ' . $token
        ]);
        $response->assertStatus(200);
        self::assertIsObject(json_decode($response->getContent()));
    }
    
    public function test_listagem_vendas_para_diretor_geral(){
        $diretor_geral = User::whereHas('roles', function($q){
            $q->where('name', 'Diretor Geral');
        })->first();
    
        $response = $this->post('/api/login', [
        'email' => $diretor_geral->email,
        'password' => '123mudar'
        ]);
    
        $content = json_decode($response->getContent());
        $token = $content->authorization->token;
        
        $response = $this->get('/api/vendas/lista',[
        'Authorization' => 'Bearer ' . $token
        ]);
        $response->assertStatus(200);
        self::assertIsObject(json_decode($response->getContent()));
    }
    
    public function test_listagem_vendas_para_diretor(){
        $diretor = User::whereHas('roles', function($q){
            $q->where('name', 'Diretor');
        })->first();
    
        $response = $this->post('/api/login', [
        'email' => $diretor->email,
        'password' => '123mudar'
        ]);
    
        $content = json_decode($response->getContent());
        $token = $content->authorization->token;
        
        $response = $this->get('/api/vendas/lista',[
            'Authorization' => 'Bearer ' . $token
        ]);
        $response->assertStatus(200);
        self::assertIsObject(json_decode($response->getContent()));
    }
    
    public function test_listagem_vendas_para_gerente(){
        $gerente = User::whereHas('roles', function($q){
            $q->where('name', 'Gerente');
        })->first();
    
        $response = $this->post('/api/login', [
            'email' => $gerente->email,
            'password' => '123mudar'
        ]);
    
        $content = json_decode($response->getContent());
        $token = $content->authorization->token;
        
        $response = $this->get('/api/vendas/lista',[
        'Authorization' => 'Bearer ' . $token
        ]);
        $response->assertStatus(200);
        self::assertIsObject(json_decode($response->getContent()));
    }
    
    public function test_listagem_vendas_para_vendedor(){
        $vendedor = User::whereHas('roles', function($q){
            $q->where('name', 'Vendedor');
        })->first();
        
        $response = $this->post('/api/login', [
        'email' => $vendedor->email,
        'password' => '123mudar'
        ]);
    
        $content = json_decode($response->getContent());
        $token = $content->authorization->token;
        
        $response = $this->get('/api/vendas/lista',[
        'Authorization' => 'Bearer ' . $token
        ]);
        $response->assertStatus(200);
        self::assertIsObject(json_decode($response->getContent()));
    }
}