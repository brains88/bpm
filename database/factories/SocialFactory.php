<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker\Factory as Faker;

class SocialFactory extends Factory
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
            'whatsapp' => $faker->url(),
            'twitter' => $faker->url(),
            // 'instagram' => $faker->url(),
            // 'facebook' => $faker->url(),
            'linkedin' => $faker->url(),
            // 'youtube' => $faker->url(),
            'user_id' => rand(1, User::count()),
        ];
    }
}
