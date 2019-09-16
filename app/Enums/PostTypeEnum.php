<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static PostTypeEnum NEWS()
 * @method static PostTypeEnum DEPO()
 * @method static PostTypeEnum ARTI()
 */
final class PostTypeEnum extends Enum
{
    const __default = self::ARTI;

    const NEWS = 'noticia';
    const DEPO = 'depoimento';
    const ARTI = 'artigo';
}
