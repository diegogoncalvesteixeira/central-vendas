<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unidade extends Model
{
    
    use HasFactory;
    
    protected $table = "unidades";
    
    protected $fillable = [
        'nome',
        'diretoria_id',
        'lat_long',
    ];
    
    public function diretoria(): Builder|BelongsTo
    {
        return $this->belongsTo(Diretoria::class);
    }
    
    public function vendas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Venda::class);
    }
    
    public function users(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(User::class,
        UserUnidade::class,
        'unidade_id',
        'id',
        'id',
        'user_id'
        );
    }
}