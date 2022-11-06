<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use App\Services\GridViewService;

class CollectionController extends Controller
{
    public GridViewService $grid;

    public function ordered()
    {
        $dummy=Dummy::query()->get('string')->toArray();

      return  GridViewService::ordered('tesytutvc', $dummy);
    }
    public function searched()
    {
        $search='Saepe voluptatem ex blanditiis consequatur reprehenderit iusto. Recusandae et architecto nisi. Velit ut alias amet dolorem quasi ullam dolorum asperiores.';
        $dummy=Dummy::all()->toArray();

        return  GridViewService::searches('tesytutvc',$dummy,$search);
    }

    public function makeColumn()
    {
        $column=['string','integer'];
        $columnTitle='hasan';
        return  GridViewService::makeColumn($column,$columnTitle);
    }
    public function paginate()
    {
        $column=['string','integer'];
        $columnTitle='hasan';
        $dummy=Dummy::all()->toArray();

        return  GridViewService::paginate($dummy,10);
    }
    public function makeCollection()
    {
       return GridViewService::makeCollection('test-title');
    }
}
