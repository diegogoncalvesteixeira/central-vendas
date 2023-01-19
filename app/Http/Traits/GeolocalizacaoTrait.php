<?php

namespace App\Http\Traits;use Geocoder\Geocoder;
use Psy\Util\Str;

trait GeolocalizacaoTrait
{
    public function retorna_array_latitude_longitude($latLong): array
    {
        $latLong = str_replace('(', '', $latLong);
        $latLong = str_replace(')', '', $latLong);
        return explode(',', $latLong);
    }
    
    public function retorna_cidade_pela_latitude_longitude($latLong)
    {
        $latLong = $this->retorna_array_latitude_longitude($latLong);
        
        $apiKey = env('GOOGLE_MAPS_API_KEY');
    
        // Coordenadas para procurar
        $latitude = $latLong[0];
        $longitude = $latLong[1];
    
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $latitude . ',' . $longitude . '&key=' . $apiKey;
        $response = \Http::get($url);
        $response = json_decode($response->body());
        
        if(!isset($response->results[0]->address_components[3]->long_name))
            return 'Cidade não encontrada';
        
        return $response->results[0]->address_components[3]->long_name;
    }
    
    public function retorna_geoinfo_pelo_nome_cidade($cidade){
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $cidade . '&key=' . $apiKey;
        $response = \Http::get($url);
        $response = json_decode($response->body());
        
        return $response->results[0];
    }
    
    public function calcula_distancia_entre_duas_cidades_em_km($origem, $destino): array|string
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
    
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=' . $origem . '&destinations=' . $destino . '&key=' . $apiKey;
        $response = \Http::get($url);
        $response = json_decode($response->body());
        
        if(!isset($response->rows[0]->elements[0]->distance->text))
            return 0;
        
        $distancia = $response->rows[0]->elements[0]->distance->text;
        return str_replace(' km', '', $distancia);
    }
    
    public function verifica_se_venda_foi_feita_na_mesma_cidade_da_unidade($venda): bool
    {
        $cidade_venda = $this->retorna_cidade_pela_latitude_longitude($venda->latitude_longitude);
        $cidade_unidade = $venda->unidade->nome;
        
        if($cidade_venda == $cidade_unidade){
            return true;
        }
        
        return false;
    }
}