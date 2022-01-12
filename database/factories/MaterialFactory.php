<?php

namespace Database\Factories;
use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use Faker\Factory as Faker;

class MaterialFactory extends Factory
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
            'user_id' => $faker->numberBetween(1, 4560),
            'address' => $faker->address(),
            'name' => $faker->sentence(),
            'price' => $faker->numberBetween(2000, 11000),
            'country_id' => $faker->numberBetween(1, 240),
            'status' => $faker->randomElement(Material::$status),
            'state' => $faker->state(),
            'image' => $faker->imageUrl($width = 960, $height = 1024),
            'currency_id' => $faker->numberBetween(1, 8),
            'quantity' => $faker->numberBetween(25, 89),
            'reference' => \Str::uuid(),
            'city' => $faker->city(),
            'additional' => $faker->paragraph(15),
            'created_at' => Carbon::now(),
        ];
    }
}
