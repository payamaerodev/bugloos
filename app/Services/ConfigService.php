<?php


namespace App\Services;


use App\Models\Config;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

class ConfigService
{

    /**
     * @param string|null $name
     * @param string|null $metadata
     * @return string
     */
    public static function getConfig(string $name = null, string $metadata = null)
    {
        $config = $name != null ? $name : 'default';

        return $metadata != null ? json_decode($metadata) : Config::query()->where('name', $config)->first()->value;
    }

    /**
     * @param string $name
     * @param string $metadata
     * @return string
     */
    public static function setConfig(string $name, string $metadata): string
    {
        Config::query()->create(json_decode($metadata));
    }

    /**
     * @param string $name
     * @param string $metadata
     * @return string
     */
    public static function updateConfig(string $name , string $metadata): string
    {
        return Config::query()->findOrFail($name)->update(json_decode($metadata, true));
    }
}
