<?php

namespace App;

use App\Enums\ProductTypeEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;

class Produto extends Model
{
    use EnumCastable;

    protected $casts = [
        'tipo' => ProductTypeEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
