<?php

namespace App;

use App\Traits\Anexos;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;

class Evento extends Model
{
    use Anexos;
    use EnumCastable;

    public function anexo()
    {
        return $this->morphOne(Anexo::class, 'anexavel');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
