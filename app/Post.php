<?php

namespace App;

use App\Traits\Anexos;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Anexos;

    public function anexo()
    {
        return $this->morphOne(Anexo::class, 'anexavel');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
