<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;
use Faker\Factory as Faker;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

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
            'type_id' => $faker->numberBetween(1, 80),
        ];
    }
}
