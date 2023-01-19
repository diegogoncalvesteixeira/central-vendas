<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;

class LoginTest extends TestCase
{
    use WithFaker, DatabaseTransactions;
    
    public function testLoginDiretorGeral(){
        $user = User::whereHas('roles', function($q){
            $q->where('name', 'Diretor Geral');
        })->first();
        
        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => '123mudar'
        ]);
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertObjectHasAttribute('authorisation', $content);
        
        $token = $content->authorisation;
        $this->assertObjectHasAttribute('token', $token);
        $this->assertObjectHasAttribute('type', $token);
    }
    
    public function testLoginDiretor(){
        $user = User::whereHas('roles', function($q){
            $q->where('name', 'Diretor');
        })->first();
        
        $response = $this->post('/api/login', [
        'email' => $user->email,
        'password' => '123mudar'
        ]);
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertObjectHasAttribute('authorisation', $content);
        
        $token = $content->authorisation;
        $this->assertObjectHasAttribute('token', $token);
        $this->assertObjectHasAttribute('type', $token);
    }
    
    public function testGerente(){
        $user = User::whereHas('roles', function($q){
            $q->where('name', 'Diretor');
        })->first();
        
        $response = $this->post('/api/login', [
        'email' => $user->email,
        'password' => '123mudar'
        ]);
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertObjectHasAttribute('authorisation', $content);
        
        $token = $content->authorisation;
        $this->assertObjectHasAttribute('token', $token);
        $this->assertObjectHasAttribute('type', $token);
    }
    
    public function testVendedor(){
        $user = User::whereHas('roles', function($q){
            $q->where('name', 'Diretor');
        })->first();
        
        $response = $this->post('/api/login', [
        'email' => $user->email,
        'password' => '123mudar'
        ]);
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertObjectHasAttribute('authorisation', $content);
        
        $token = $content->authorisation;
        $this->assertObjectHasAttribute('token', $token);
        $this->assertObjectHasAttribute('type', $token);
    }
    
    public function testUsuarioInvalido(){
        $response = $this->post('/api/login', [
        'email' => 'usuarioinvalido@gmail.com',
        'password' => '123mudar'
        ]);
        $response->assertStatus(401);
    }
    
}