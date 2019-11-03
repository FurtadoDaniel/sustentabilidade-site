<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class AbaixoAssinado extends Model
{


    public function assinaturas(){
        return $this->hasMany('App\Assinaturas','abaixo_id','id');
    }
}
