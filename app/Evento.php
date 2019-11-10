<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Plank\Mediable\Mediable;

class Evento extends Model
{
    use Mediable;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    
    protected $midias = [
        'foto', 'video'
    ];

    public function getMidias()
    {
        return $this->midias;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function confirmados()
    {
        return $this->belongsToMany(User::class)->as('confirmacao');
    }
}
