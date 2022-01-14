<?php

namespace Database\Factories;
use App\Models\{Membership, Subscription, User, Payment};
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
            'user_id' => rand(1, User::count()),
            'renewals' => $faker->numberBetween(2, 9),
            'reference' => \Str::uuid(),
            'payment_id' => rand(1, Payment::count()),
            'started' => $faker->randomElement([Carbon::yesterday(), Carbon::now()->subDays(5), Carbon::now()->subDays(3), Carbon::now()->subDays(22)]),
            'membership_id' => rand(1, Membership::count()),
            'duration' => $faker->randomElement(array_values(Membership::$durations)),
            'expiry' => Carbon::yesterday()->addDays($faker->randomElement(array_values(Membership::$durations))),
        ];
    }
}
