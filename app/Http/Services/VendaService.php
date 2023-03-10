<?php

namespace App\Http\Services;

use App\Models\Venda;
use App\Models\User;
use App\Http\Traits\GeolocalizacaoTrait;
use App\Models\Unidade;

class VendaService
{
    use GeolocalizacaoTrait;
    
    private UnidadeService $unidadeService;
    
    public function __construct()
    {
        $this->unidadeService = new UnidadeService();
    }
    
    public function cadastro($request)
    {
        $unidade = User::where('id',$request->vendedor_id)->first()->unidades()->first();
        
        //cria a venda
        $venda = Venda::create([
            'user_id' => $request->vendedor_id,
            'unidade_id' => $unidade->id,
            'latitude_longitude' => $request->latitude_longitude,
            'data_hora_venda' => $request->data_hora_venda,
            'valor_total' => $request->valor_total,
        ]);
        
        if(!$this->verifica_se_venda_foi_feita_na_mesma_cidade_da_unidade($venda)){
            $unidade_mais_proxima = $this->unidadeService->retorna_unidade_mais_proxima($venda->latitude_longitude);
            
            $venda->roaming()->create([
                'unidade_id' => $unidade_mais_proxima->id,
            ]);
        }
        
        return $venda;
    }
    
    public function listagem_vendas_para_diretor_geral()
    {
        return Venda::with('vendedor', 'unidade', 'diretoria', 'roaming')->get();
    }
    
    public function listagem_vendas_para_diretor($user_id){
        $user = User::where('id',$user_id)->with('diretorias')->first();
        $diretoria = collect($user->diretorias)->first();
        $unidades = Unidade::where('diretoria_id', $diretoria->id)->get();
        return Venda::with('vendedor', 'unidade', 'diretoria', 'roaming')->whereIn('unidade_id', $unidades->pluck('id'))->get();
    }
    
    public function listagem_vendas_para_gerente($user_id){
        $user = User::where('id',$user_id)->with('unidades')->first();
        $unidade = collect($user->unidades)->first();
        return Venda::where('unidade_id',$unidade->id)->with('vendedor', 'unidade', 'diretoria', 'roaming')->get();
    }
    
    public function listagem_vendas_para_vendedor($user_id){
        return Venda::where('user_id',$user_id)->with('vendedor', 'unidade', 'diretoria', 'roaming')->get();
    }
    
    public function numeros_vendas_por_unidade_para_diretor_geral(){
        return Unidade::withCount('vendas')->get();
    }
    
    public function numeros_vendas_por_unidade_para_diretor($user_id){
        $user = User::where('id',$user_id)->with('diretorias')->first();
        $diretoria = collect($user->diretorias)->first();
        $unidades = Unidade::where('diretoria_id', $diretoria->id)->get();
        return Unidade::whereIn('id', $unidades->pluck('id'))->withCount('vendas')->get();
    }
    
    public function numeros_vendas_por_unidade_para_gerente($user_id){
        $user = User::where('id',$user_id)->with('unidades')->first();
        $unidade = collect($user->unidades)->first();
        return Unidade::where('id',$unidade->id)->withCount('vendas')->get();
    }
    
    public function numeros_vendas_por_unidade_para_vendedor($user_id){
        return Unidade::whereHas('users', function($query) use ($user_id){
            $query->where('user_id', $user_id);
        })->withCount('vendas')->get();
    }
    
    
}