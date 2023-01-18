<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diretoria extends Model
{
    use hasFactory;
    
    protected $table = "diretorias";
    
    protected $fillable = [
        'nome',
    ];
    
    public function diretores(): Builder|HasMany
    {
        return $this->hasMany(User::class)->whereHas("roles", function($q){ $q->where("name", "Diretor"); });
    }
    
    public function unidades(): Builder|HasMany
    {
        return $this->hasMany(Unidade::class);
    }
}