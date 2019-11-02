<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static EspecieTypeEnum ANIMAL()
 * @method static EspecieTypeEnum ARVORE()
 */
final class EspecieTypeEnum extends Enum
{
    const __default = self::ANIMAL;

    const ANIMAL = 'animal';
    const PLANTA = 'planta';
}
