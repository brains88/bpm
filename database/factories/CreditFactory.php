<?php

namespace Database\Factories;
use Faker\Factory as Faker;
use App\Models\{User, Payment, Unit};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
            'status' => 'paused',
            'user_id' => rand(1, User::count()),
            'units' => $faker->numberBetween(23, 109),
            'reference' => Str::random(64),
            'unit_id' => rand(1, Unit::count()),
            'inuse' => $faker->boolean(40),
            'payment_id' => rand(1, Payment::count()),
        ];
    }

}
