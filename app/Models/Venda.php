<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venda extends Model
{
    use HasFactory;
    
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
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
