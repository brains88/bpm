<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Image, Material, Property};
use Faker\Factory as Faker;

class ImageFactory extends Factory
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
            'type' => $faker->randomElement(['property', 'materials']),
            'link' => $faker->imageUrl($width = 1260, $height = 960),
            'property_id' => rand(1, Property::count()),
            'material_id' => rand(1, Material::count()),
            'reference' => \Str::uuid(),
        ];
    }
}
