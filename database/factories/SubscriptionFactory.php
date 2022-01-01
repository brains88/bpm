<?php

namespace Database\Factories;
use App\Models\{Plan, Subscription};
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SubscriptionFactory extends Factory
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
            'amount' => $faker->numberBetween(50, 2500),
            'status' => $faker->randomElement(Subscription::$status),
            'user_id' => $faker->numberBetween(1, 300),
            'renewals' => $faker->numberBetween(2, 9),
            'reference' => \Str::uuid(),
            'subscribed' => $faker->randomElement([Carbon::yesterday(), Carbon::now()->subDays(5), Carbon::now()->subDays(3), Carbon::now()->subDays(22)]),
            'plan_id' => $faker->numberBetween(1, 13),
            'duration' => $faker->randomElement(array_values(Plan::$durations)),
            'expiry' => Carbon::yesterday()->addDays($faker->randomElement(array_values(Plan::$durations))),
        ];
    }
}
