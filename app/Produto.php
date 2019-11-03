<?php

namespace App;

use App\Enums\ProductTypeEnum;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Enum\EnumCastable;
use Plank\Mediable\Mediable;

class Produto extends Model
{
    use EnumCastable;
    use Mediable;

    protected $casts = [
        'tipo' => ProductTypeEnum::class,
    ];

    protected $midias = [
        'foto', 'video'
    ];

    public function getMidias()
    {
        return $this->midias;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
