<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unidade;
use App\Models\Diretoria;

class UnidadeSeeder extends Seeder
{
    public function run()
    {
        //cria unidade Porto Alegre
        Unidade::factory()->create([
            'nome' => 'Porto Alegre',
            'diretoria_id' => Diretoria::where('nome', 'Sul')->first()->id,
            'lat_long' => '-30.048750057541955, -51.228587422990806',
        ]);
        
        //cria unidade Florianópolis
        Unidade::factory()->create([
            'nome' => 'Florianópolis',
            'diretoria_id' => Diretoria::where('nome', 'Sul')->first()->id,
            'lat_long' => '-27.55393525017396, -48.49841515885026',
        ]);
        
        //cria unidade Curitiba
        Unidade::factory()->create([
            'nome' => 'Curitiba',
            'diretoria_id' => Diretoria::where('nome', 'Sul')->first()->id,
            'lat_long' => '-25.473704465731746, -49.24787198992874',
        ]);
        
        //cria unidade São Paulo
        Unidade::factory()->create([
            'nome' => 'São Paulo',
            'diretoria_id' => Diretoria::where('nome', 'Sudeste')->first()->id,
            'lat_long' => '-30.048750057541955, -51.228587422990806',
        ]);
        
        //cria unidade Rio de Janeiro
        Unidade::factory()->create([
            'nome' => 'Rio de Janeiro',
            'diretoria_id' => Diretoria::where('nome', 'Sudeste')->first()->id,
            'lat_long' => '-22.923447510604802, -43.23208495438858',
        ]);
        
        //cria unidade Belo Horizonte
        Unidade::factory()->create([
            'nome' => 'Belo Horizonte',
            'diretoria_id' => Diretoria::where('nome', 'Sudeste')->first()->id,
            'lat_long' => '-19.917854829716372, -43.94089385954766',
        ]);
        
        //cria unidade Vitória
        Unidade::factory()->create([
            'nome' => 'Vitória',
            'diretoria_id' => Diretoria::where('nome', 'Sudeste')->first()->id,
            'lat_long' => '-20.340992420772206, -40.38332271475097',
        ]);
        
        //cria unidade Campo Grande
        Unidade::factory()->create([
            'nome' => 'Campo Grande',
            'diretoria_id' => Diretoria::where('nome', 'Centro-Oeste')->first()->id,
            'lat_long' => '-20.462652006300377, -54.615658937666645',
        ]);
        
        //cria uniade Goiânia
        Unidade::factory()->create([
            'nome' => 'Goiânia',
            'diretoria_id' => Diretoria::where('nome', 'Centro-Oeste')->first()->id,
            'lat_long' => '-16.673126240814387, -49.25248826354209',
        ]);
        
        //cria unidade Cuiaba
        Unidade::factory()->create([
            'nome' => 'Cuiaba',
            'diretoria_id' => Diretoria::where('nome', 'Centro-Oeste')->first()->id,
            'lat_long' => '-15.601754458320842, -56.09832706558089',
        ]);
        
        
    }
}
