<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Repositories\Eloquent\ConfigRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ConfigController extends Controller
{


    /**
     * @param  Request  $request
     * @param $id
     *
     * @return mixed
     */
    public function update(Request $request, $id): mixed
    {
        $request->validate([
            'value' => 'required',
        ]);

        $config = Config::query()->findOrFail($id);
        $config->update($request->only('value'));

        return $config;
    }

}
