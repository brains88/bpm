<?php

namespace Database\Factories;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        $timestamps = [Carbon::now(), Carbon::now()->subMonths(1), Carbon::now()->subMonths(2), Carbon::now()->subMonths(3), Carbon::now()->subMonths(4), Carbon::now()->subMonths(5), Carbon::now()->subMonths(6), Carbon::now()->subMonths(7), Carbon::now()->subMonths(9), Carbon::now()->subMonths(10),Carbon::now()->subMonths(11), Carbon::now()->subMonths(12), Carbon::now()->subMonths(13), Carbon::now()->subMonths(14), Carbon::now()->subMonths(15), Carbon::now()->subMonths(16), Carbon::now()->subMonths(17), Carbon::now()->subMonths(18)];

        return [
            'useragent' => $faker->userAgent(),
            'ip' => long2ip((mt_rand()*mt_rand(1, 2))+mt_rand(0, 1)),
            'iso2' => $faker->countryCode(),
            'country' => $faker->country(),
            'city' => $faker->city(),
            'state' => $faker->state(),
            'postalcode' => $faker->postcode(),
            'latitude' => $faker->latitude($min = -90, $max = 90),
            'longitude' => $faker->longitude($min = -180, $max = 180),
            'timezone' => $faker->timezone(),
            'currency' => $faker->currencyCode(),
            'default' => $faker->boolean($chanceOfGettingTrue = 40),
            'created_at' => $faker->randomElement($timestamps),
        ];
    }
}
