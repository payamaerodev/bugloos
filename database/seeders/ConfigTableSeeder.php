<?php

namespace Database\Seeders;

use App\Models\Config;
use App\Support\Services\MiniWallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Config::find('default')) {
            Config::query()->create([
                'name' => 'default',
                'value' => [
                    'length' => 10,
                    'sortables' => [
                        'string',
                        'integer',
                    ],
                    'searchable' => [
                        'string'
                    ]
                ],
            ]);
        }
    }
}
