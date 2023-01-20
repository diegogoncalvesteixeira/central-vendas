<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Traits\GeolocalizacaoTrait;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Venda;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GeolocalizacaoTest extends TestCase
{
    use withFaker, GeolocalizacaoTrait, DatabaseTransactions;
    
    public function testRetornaCidadePelaLatitudeLongitude(){
        $cidade = $this->retorna_cidade_pela_latitude_longitude('-23.5505, -46.6333');
        $this->assertIsString($cidade);
    }
    
    public function test_retorna_array_latitude_longitude(){
        $array = $this->retorna_array_latitude_longitude('-23.5505, -46.6333');
        $this->assertIsArray($array);
    }
    
    public function test_retorna_geoinfo_pelo_nome_cidade(){
        $geoinfo = $this->retorna_geoinfo_pelo_nome_cidade('São Paulo');
        $this->assertIsObject($geoinfo);
    }
    
    public function test_calcula_distancia_entre_duas_cidades_em_km(){
        $distancia = $this->calcula_distancia_entre_duas_cidades_em_km('São Paulo', 'Rio de Janeiro');
        $this->assertIsString($distancia);
    }
    
    public function test_verifica_se_venda_foi_feita_na_mesma_cidade_da_unidade(){
        $venda = Venda::factory()->create();
        $mesma_cidade = $this->verifica_se_venda_foi_feita_na_mesma_cidade_da_unidade($venda);
        $this->assertIsBool($mesma_cidade);
    }
}