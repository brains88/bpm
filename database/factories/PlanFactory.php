<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plan;
use Faker\Factory as Faker;

class PlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'name' => $faker->randomElement(['gold', 'diamond', 'silver', 'saphire', 'bronde']),
            'price' => $faker->numberBetween(43, 965),
            'duration' => $faker->randomElement(array_keys(Plan::$durations)),
            'listing' => $faker->numberBetween(10, 1200),
            'details' => $faker->text(25),
        ];

    }
}
