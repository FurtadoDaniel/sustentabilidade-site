<?php

namespace App\Enums;

use MadWeb\Enum\Enum;

/**
 * @method static TipoEventoEnum PASSEATA()
 * @method static TipoEventoEnum COMUNITARIA()
 * @method static TipoEventoEnum SEMINARIO()
 * @method static TipoEventoEnum WORKSHOP()
 * @method static TipoEventoEnum FEIRA()
 */
final class TipoEventoEnum extends Enum
{
    const __default = self::PASSEATA;

    const PASSEATA = 'passeata';
    const COMUNITARIA = 'atividade comunitaria';
    const SEMINARIO = 'seminario';
    const WORKSHOP = 'worksho';
    const FEIRA = 'feira';
}
