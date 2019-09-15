<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }
    
    public function users()
    {
        return $this->hasMany(User::class, ['animal_id', 'arvore_id'], 'id');
    }
}
