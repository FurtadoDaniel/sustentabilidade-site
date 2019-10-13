<?php

namespace App;

use App\Enums\ProductTypeEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Produto extends Model implements HasMedia
{
    use EnumCastable;
    use HasMediaTrait;

    protected $casts = [
        'tipo' => ProductTypeEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
