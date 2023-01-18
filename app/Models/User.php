<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function unidades(): BelongsToMany
    {
        return $this->belongsToMany(Unidade::class, UserUnidade::class, "user_id", "unidade_id");
    }
    
    public function diretorias(): BelongsToMany
    {
        return $this->belongsToMany(Diretoria::class, UserDiretoria::class, "user_id", "diretoria_id");
    }
    
    public function scopeDiretorGeral(): bool
    {
        return $this->hasRole('Diretor Geral');
    }
    
    public function scopeDiretor(): bool
    {
        return $this->hasRole('Diretor');
    }
    
    public function scopeGerente(): bool
    {
        return $this->hasRole('Gerente');
    }
    
    public function scopeVendedor(): bool
    {
        return $this->hasRole('Vendedor');
    }
    
    
    
}
