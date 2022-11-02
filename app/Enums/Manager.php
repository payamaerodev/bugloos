<?php

namespace App\Enums;

use Illuminate\Database\Schema\Grammars\Grammar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

abstract class Manager
{
    protected static string $type;
    protected static array $values;

    public static function up()
    {
        $type = static::$type;

        $macroName = 'type' . Str::ucfirst(Str::camel($type));

        Grammar::macro($macroName, fn() => $type);

        DB::unprepared('DROP TYPE IF EXISTS ' . $type);
        DB::unprepared('CREATE TYPE ' . $type . ' AS ENUM (\'' . implode("','", static::$values) . '\')');
    }

    public static function down()
    {
        DB::unprepared('DROP TYPE IF EXISTS ' . static::$type);
    }

}
