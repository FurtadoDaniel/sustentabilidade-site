<?php

namespace App;

use App\Enums\PostTypeEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;

class Post extends Model
{
    use EnumCastable;

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
