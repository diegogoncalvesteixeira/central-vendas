<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserDiretoria extends Model
{
    protected $table = "users_diretorias";
    
    protected $fillable = [
        'user_id',
        'diretoria_id',
    ];
    
    public function user(): Builder|BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function diretoria(): Builder|BelongsTo
    {
        return $this->belongsTo(Diretoria::class);
    }
    
    public function diretor(): Builder|BelongsTo
    {
        return $this->diretoria->diretores();
    }
    
    public function unidades(): Builder|HasMany
    {
        return $this->diretoria->unidades();
    }
    
}
