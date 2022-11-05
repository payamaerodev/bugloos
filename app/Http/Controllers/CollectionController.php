<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use App\Services\GridViewService;
use Illuminate\Database\Eloquent\Collection;

class CollectionController extends Controller
{
    public GridViewService $grid;

    public function ordered(): Collection|array
    {
      return  GridViewService::ordered(Dummy::class);
    }
    public function searched(): Collection|array
    {
      return  GridViewService::searches(Dummy::class,['integer'],29651);
    }
}
