<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserUnidade extends Model
{
    protected $table = "users_unidades";
    
    protected $fillable = [
        'user_id',
        'unidade_id',
    ];
    
    public function user(): Builder|BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function unidade(): Builder|BelongsTo
    {
        return $this->belongsTo(Unidade::class);
    }
    
    public function diretoria(): Builder|BelongsTo
    {
        return $this->unidade->diretoria();
    }
    
    public function diretor(): Builder|BelongsTo
    {
        return $this->diretoria->diretores();
    }
}
