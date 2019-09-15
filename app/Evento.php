<?php

namespace App;

use App\Traits\Anexos;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use Anexos;

    public function anexo()
    {
        $this->morphOne(Anexo::class, 'anexavel');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
