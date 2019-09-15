<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
