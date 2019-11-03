<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;

class Evento extends Model
{
    use EnumCastable;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function confirmados()
    {
        return $this->belongsToMany(User::class)->as('confirmacao');
    }
}
