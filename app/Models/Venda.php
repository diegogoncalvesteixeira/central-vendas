<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Venda extends Model
{
    use HasFactory;
    
    protected $table = 'vendas';
    
    protected $fillable = [
        'user_id',
        'unidade_id',
        'latitude_longitude',
        'data_hora_venda',
        'valor_total',
    ];
    
    public function roaming(): HasOne
    {
        return $this->hasOne(VendaRoaming::class);
    }
    
    public function unidade(): BelongsTo
    {
        return $this->belongsTo(Unidade::class);
    }
    
    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function diretoria(): HasOneThrough
    {
        return $this->hasOneThrough(
        Diretoria::class,
        Unidade::class,
        'id',
        'id',
        'unidade_id',
        'diretoria_id'
        );
    }
}
