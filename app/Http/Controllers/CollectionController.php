<?php

namespace App\Http\Controllers;

use App\Enums\Type;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CollectionController extends Controller
{

    public function insert(\Illuminate\Http\Request $request)
    {

        try {
            Validator::make([$request->title, $request->type], [
                'title' => 'required|max:10',
                'type' => 'required|in:' . implode(",",Type::$values),
            ])->validate();
        } catch (ValidationException $e) {
        }
        return Collection::create([
            'title' => $request->title,
            'type' => $request->type,
        ]);
    }
//    public function insert()
//    {
//        QueryBuilder::for(Column::class)->paginate();
//    }
}
