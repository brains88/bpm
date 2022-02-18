<?php

namespace Database\Factories;
use App\Models\{Service, User};
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class GigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        return [
            'user_id' => rand(1, User::count()),
            'description' => $faker->text($maxNbChars = 400),
            'price' => $faker->numberBetween(2000, 11000),
            'image' => $faker->imageUrl($width = 460, $height = 824),
            'service_id' => rand(1, Service::count()),
            'status' => 'active',
            'clicks' => $faker->numberBetween(40, 670),
        ];
    }
}
