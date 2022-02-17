<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Membership, Currency};
use Faker\Factory as Faker;

class MembershipFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'name' => $faker->randomElement(Membership::$names),
            'price' => $faker->numberBetween(20, 90),
            'duration' => $faker->randomElement(array_keys(Membership::$durations)),
            'maxlisting' => $faker->numberBetween(100, 900),
            'details' => $faker->text(25),
            'currency_id' => rand(1, Currency::count())
        ];

    }
}
