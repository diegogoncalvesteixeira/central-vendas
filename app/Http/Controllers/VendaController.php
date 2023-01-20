<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VendaCadastroRequest;
use App\Http\Services\VendaService;
use App\Models\Venda;
use App\Models\Unidade;
use App\Http\Middleware\ApiMiddleware;
use App\Models\User;


class VendaController extends Controller
{
    private VendaService $vendaService;
    
    public function __construct()
    {
        $this->middleware(ApiMiddleware::class);
        $this->vendaService = new VendaService();
    }
    
    public function cadastro(VendaCadastroRequest $request){
        $this->vendaService->cadastro($request);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Venda realizada com sucesso',
        ]);
    }
    
    public function detalhes($id){
        $venda = Venda::find($id);
        
        return response()->json([
            'status' => 'success',
            'data' => $venda,
        ]);
    }
    
    public function lista(Request $request){
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $role = collect($user->getRoleNames())->first();
        
        if($role == 'Diretor Geral'){
            $vendas = $this->vendaService->listagem_vendas_para_diretor_geral();
        }elseif($role=='Diretor'){
            $vendas = $this->vendaService->listagem_vendas_para_diretor($user_id);
        }elseif($role=='Gerente'){
            $vendas = $this->vendaService->listagem_vendas_para_gerente($user_id);
        }elseif($role=='Vendedor'){
            $vendas = $this->vendaService->listagem_vendas_para_vendedor($user_id);
        
        }
        
        return response()->json([
            'status' => 'success',
            'data' => $vendas,
        ]);
    }
    
    public function numeros(Request $request){
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $role = collect($user->getRoleNames())->first();
    
        if($role == 'Diretor Geral'){
            $unidades = $this->vendaService->numeros_vendas_por_unidade_para_diretor_geral();
        }elseif($role=='Diretor'){
            $unidades = $this->vendaService->numeros_vendas_por_unidade_para_diretor($user_id);
        }elseif($role=='Gerente'){
            $unidades = $this->vendaService->numeros_vendas_por_unidade_para_gerente($user_id);
        }elseif($role=='Vendedor'){
            $unidades = $this->vendaService->numeros_vendas_por_unidade_para_vendedor($user_id);
        }
        
        return response()->json([
            'status' => 'success',
            'data' => $unidades,
        ]);
    }
}
