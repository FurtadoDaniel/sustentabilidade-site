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
