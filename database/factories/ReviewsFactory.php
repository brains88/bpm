<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Review, User, Country};
use Faker\Factory as Faker;


class ReviewsFactory extends Factory
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
            'review' => $faker->text(),
            'status' => $faker->randomElement(Review::$status),
            'user_id' => rand(1, User::count()),
            'reviewer_id' => rand(1, User::count()),
        ];
    }
}
