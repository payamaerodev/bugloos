<?php

namespace App\Enums;

use App\Enums\Manager;

class Type extends Manager
{
    public const STR = 'STR';
    public const BOOLEAN = 'BOOLEAN';
    public const DATE = 'DATE';
    public const NUMBER = 'NUMBER';
    public const LENGTH = 'LENGTH';

    public static array $values  = [
        self::STR,
        self::BOOLEAN,
        self::DATE,
        self::NUMBER,
        self::LENGTH,
    ];

    public static string $type = 'col_type';
}
