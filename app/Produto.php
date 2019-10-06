<?php

namespace App;

use App\Enums\ProductTypeEnum;
use App\Traits\Anexos;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Produto extends Model
{
    use Anexos;
    use EnumCastable;
    use HasMediaTrait;

    protected $casts = [
        'tipo' => ProductTypeEnum::class,
    ];

    public function anexo()
    {
        return $this->morphOne(Anexo::class, 'anexavel');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
