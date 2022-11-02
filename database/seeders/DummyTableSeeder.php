<?php

namespace Database\Seeders;

use App\Models\Dummy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Dummy::factory()->count(40)->create();
    }
}
