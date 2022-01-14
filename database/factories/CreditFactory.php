<?php

namespace Database\Factories;
use Faker\Factory as Faker;
use App\Models\{User, Payment, Unit};
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditFactory extends Factory
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
            'price' => $faker->numberBetween(100, 1500),
            'status' => 'paused',
            'user_id' => rand(1, User::count()),
            'units' => $faker->numberBetween(23, 109),
            'reference' => \Str::uuid(),
            'unit_id' => rand(1, Unit::count()),
            'payment_id' => rand(1, Payment::count()),
        ];
    }

}
