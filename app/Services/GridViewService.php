<?php


namespace App\Services;


use App\Models\Dummy;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class GridViewService
{
    public static Collection $data;

    /**
     * @param string $collectionTitle
     * @param array $data
     * @param string|null $name
     * @return Collection
     * @throws Exception
     */
    public static function ordered(string $collectionTitle, array $data, string $name = null): Collection
    {
        try {
            // this data is filled temporary
            self::fillColumn($collectionTitle, 'string', $data);
            $collection = \App\Models\Collection::query()->firstWhere(['title' => $collectionTitle]);

            return Collection::make($collection->columns()->get('string'))->sortDesc();
        } catch (Exception $exception) {
            throw new Exception();
        }
    }


    /**
     * @param string $collectionTitle
     * @param array $data
     * @param mixed $search
     * @param string|null $name
     * @return Collection|array
     * determine searchable columns and get result
     * @throws Exception
     */
    public static function searches(string $collectionTitle, array $data, mixed $search, string $name = null): Collection|array
    {
        try {
            self::fillColumn($collectionTitle, 'string', $data);

            $searchable = ConfigService::getConfig($name)['searchable'];
            $container = new Collection();
            foreach ($searchable as $item) {

                $container->add(Collection::make($data)->where($item, 'like', $search))->all();
            }
            return $container;
        } catch (\Exception $exception) {
            throw new Exception();
        }
    }

    /**
     * @param $items
     * @param int $perPage
     * @param null $page
     * @param array $options
     * @return Paginator
     */
    public static function paginate($items, $perPage = 15, $page = null, $options = []): Paginator
    {
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new Paginator($items, $perPage, $perPage, $options);
    }

    /**
     * @param string $title
     * @return Model|Builder
     */
    public static function makeCollection(string $title): Model|Builder
    {
        return \App\Models\Collection::query()->firstOrCreate(['title' => $title]);
    }

    /**
     * @param string $collectionTitle
     * @param string $type
     * @param array $data
     */
    public static function fillColumn(string $collectionTitle, string $type, array $data = [])
    {
        $dummy = Dummy::query()->get($type)->toArray();

        $collection = \App\Models\Collection::query()->updateOrCreate(['title' => $collectionTitle]);
        foreach ($dummy as $item) {

            $collection->columns()->firstOrCreate(['title' => $type, $type => $item[$type]]);

        }
    }

    /**
     * @param array $column
     * @param string $collectionTitle
     * @return mixed
     */
    public static function makeColumn(array $column, string $collectionTitle): mixed
    {
        $collection = \App\Models\Collection::query()->firstOrCreate(['title' => $collectionTitle]);
        self::fillColumn($collectionTitle, 'string');
        foreach ($column as $value) {

            $collection->columns()->create(['title' => $value]);
        }
        return $collection->columns;
    }
}
