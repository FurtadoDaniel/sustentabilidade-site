<?php

namespace App;

use App\Enums\PostTypeEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Post extends Model implements HasMedia
{
    use EnumCastable;
    use HasMediaTrait;

    protected $casts = [
        'tipo' => PostTypeEnum::class
    ];
    protected $fillable = [
        'conteudo', 'tipo', 'titulo' 
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
