<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Evento extends Model implements HasMedia
{
    use EnumCastable;
    use HasMediaTrait;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
