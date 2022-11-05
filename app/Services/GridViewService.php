<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Spatie\QueryBuilder\QueryBuilder;

class GridViewService
{
    public static Collection $data;

    public static function ordered(string $model, string $name = null): Collection|array
    {
        $sortables = ConfigService::getConfig($name)['sortables'];

        return QueryBuilder::for($model)->allowedSorts(Arr::flatten($sortables))->defaultSort('integer')->get(Arr::flatten($sortables));
    }

    /**
     * @param string $model
     * @param array $searches
     * @param mixed $search
     * @return Collection|array
     * determine searchable columns and get result
     */
    public static function searches(string $model, array $searches, mixed $search): Collection|array
    {
        $model = new $model;
        $query = $model::query()->where($searches[0], 'LIKE', $search);
        $data = new Collection();
        foreach ($searches as $s) {
            $tempData = $model::query()->where($s, 'LIKE', $search)->get();
            $data->add($tempData);
        }
        return $data;
    }

    public static function paginate($items, $perPage = 15, $page = null, $options = []): Paginator
    {
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new Paginator($items, $perPage, $perPage, $options);
    }
}
