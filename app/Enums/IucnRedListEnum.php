<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static IucnRedListEnum LC()
 * @method static IucnRedListEnum NT()
 * @method static IucnRedListEnum VU()
 * @method static IucnRedListEnum EN()
 * @method static IucnRedListEnum CR()
 * @method static IucnRedListEnum EW()
 * @method static IucnRedListEnum EX()
 */
final class IucnRedListEnum extends Enum
{
    const __default = self::LC;

    const LC = 'segura';
    const NT = 'quase_preocupante';
    const VU = 'vulneravel';
    const EN = 'perigo';
    const CR = 'critico';
    const EW = 'cativeiro';
    const EX = 'extinta';
}
