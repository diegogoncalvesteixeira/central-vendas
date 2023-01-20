<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendaRoaming extends Model
{
    use HasFactory;
    
    protected $table = 'vendas_roaming';
    
    protected $fillable = [
        'venda_id',
        'unidade_id',
    ];
    
    public function venda(): BelongsTo
    {
        return $this->belongsTo(Venda::class);
    }
    
    public function unidade(): BelongsTo
    {
        return $this->belongsTo(Unidade::class);
    }
}
