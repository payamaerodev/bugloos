<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dummy>
 */
class DummyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'string'=>$this->faker->text,
           'integer'=>$this->faker->numberBetween(1,100000),
           'boolean'=>array_rand([true,false]),
           'date'=>$this->faker->date,
           'double'=>$this->faker->randomFloat(),
        ];
    }
}
