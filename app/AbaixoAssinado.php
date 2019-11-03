<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Plank\Mediable\Mediable;

class AbaixoAssinado extends Model
{

    use Mediable;

    protected $midias = [
        'foto', 'video'
    ];

    public function getMidias()
    {
        return $this->midias;
    }

    public function assinaturas(){
        return $this->hasMany('App\Assinaturas','abaixo_id','id');
    }
}
