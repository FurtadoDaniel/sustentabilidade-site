<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static ProductTypeEnum KIT()
 * @method static ProductTypeEnum LOJA()
 */
final class ProductTypeEnum extends Enum
{
    const __default = self::LOJA;

    const KIT = 'kit';
    const LOJA = 'loja';
}
