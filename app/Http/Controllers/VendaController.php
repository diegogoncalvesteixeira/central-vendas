<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VendaCadastroRequest;
use App\Http\Services\VendaService;
use App\Models\Venda;
use App\Models\Unidade;

class VendaController extends Controller
{
    private VendaService $vendaService;
    
    public function __construct()
    {
        $this->middleware('auth:api');
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
    
    public function lista(){
        $user = auth()->user();
        $role = collect($user->getRoleNames())->first();
        
        if($role == 'Diretor Geral'){
            $vendas = $this->vendaService->listagem_vendas_para_diretor_geral();
        }elseif($role=='Diretor'){
            $vendas = $this->vendaService->listagem_vendas_para_diretor();
        }elseif($role=='Gerente'){
            $vendas = $this->vendaService->listagem_vendas_para_gerente();
        }elseif($role=='Vendedor'){
            $vendas = $this->vendaService->listagem_vendas_para_vendedor();
        
        }
        
        return response()->json([
            'status' => 'success',
            'data' => $vendas,
        ]);
    }
    
    public function numeros(){
        $unidades = Unidade::withCount('vendas')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $unidades,
        ]);
    }
}
