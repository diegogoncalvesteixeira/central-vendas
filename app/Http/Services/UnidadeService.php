<?php

namespace App\Http\Services;

use App\Http\Traits\GeolocalizacaoTrait;
use App\Models\Unidade;

class UnidadeService
{
    use GeolocalizacaoTrait;
    
    public function retorna_unidade_mais_proxima($longitute_latitude_venda): Unidade
    {
        $cidade_venda = $this->retorna_cidade_pela_latitude_longitude($longitute_latitude_venda);
        $cidades = Unidade::get()->pluck('nome')->toArray();
        $distancias = [];
        foreach($cidades as $cidade){
            $distancias[$cidade] = $this->calcula_distancia_entre_duas_cidades_em_km($cidade_venda,$cidade);
        }
        asort($distancias);
        $cidade_mais_proxima = array_key_first($distancias);
        return Unidade::where('nome',$cidade_mais_proxima)->first();
    }
    
}