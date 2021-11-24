<?php

namespace Database\Factories;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class PropertyFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'condition' => $faker->randomElement(['Furnished', 'Unfurnished', 'Serviced', 'New']),
            'user_id' => $faker->numberBetween(1, 100),
            'address' => $faker->address(),
            'price' => $faker->numberBetween(2000, 11000),
            'status' => $faker->randomElement(['sold off', 'for sale', 'for rent']),
            'action' => $faker->randomElement(['sold', 'sale', 'rent', 'lease']),
            'country_id' => $faker->numberBetween(1, 7),
            'bedrooms' => $faker->numberBetween(3, 5),
            'toilets' => $faker->numberBetween(4, 11),
            'bathrooms' => $faker->numberBetween(3, 15),
            'image' => $faker->imageUrl($width = 960, $height = 1024, 'Real Estate', true, 'Property'),
            'category_id' => $faker->numberBetween(1, 5),
            'house_id' => $faker->numberBetween(1, 7),
            'state_id' => $faker->numberBetween(1, 700),
            'measurement' => $faker->numberBetween(500, 6500),
            'city' => $faker->city,
            'additionals' => $faker->paragraph(15),
        ];
    }
}
