<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Column;
use App\Models\Config;
use App\Models\Dummy;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\QueryBuilder\QueryBuilder;

class ColumnController extends Controller
{
    public function insert(Request $request)
    {
        $type = Collection::query()->where('title', $request->input('title'))->first();

        $data = Dummy::query()->get(strtolower($type->type))->toArray();
        $data = Arr::flatten($data);

        foreach ($data as $val) {
            Column::query()->create([
                $type => $val,
                'title' => $request->title,
            ]);
        }
    }

    public function ordered()
    {
        $sortables = Config::query()->first()->value['sortables'];

        return QueryBuilder::for(Column::class)->allowedSorts( $sortables)->get($sortables);
    }

    public function searchables(array $searchField,string $searchParam,string $collection)
    {
        $searchables = Config::query()->first()->value['searchables'];

        return QueryBuilder::for(Column::class)->allowedFilters( $searchables)->get($searchables);
    }
    public function withPaginate(int $number)
    {
        return QueryBuilder::for(Column::class)->paginate($number);
    }
}
