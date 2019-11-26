<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cpf'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function abaixoAssinados()
    {
        return $this->hasMany(AbaixoAssinado::class);
    }
    
    public function adocoes()
    {
        return $this->belongsToMany(Especie::class);
    }

    public function animais()
    {
        return $this->belongsToMany(Especie::class)->doTipo('animal');
    }
    
    public function plantas()
    {
        return $this->belongsToMany(Especie::class)->doTipo('planta');
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function confirmacoes()
    {
        return $this->belongsToMany(Evento::class)->as('confirmacao');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

}
