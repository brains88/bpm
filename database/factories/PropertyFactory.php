<?php

namespace Database\Factories;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Carbon\Carbon;

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
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

        $timestamps = [
            Carbon::now(), 
            Carbon::now()->addMonths(1), 
            Carbon::now()->addMonths(2), 
            Carbon::now()->addMonths(3), 
            Carbon::now()->addMonths(5), 
            Carbon::now()->addMonths(6), 
            Carbon::now()->addMonths(7), 
            Carbon::now()->addMonths(8), 
            Carbon::now()->addMonths(9), 
            Carbon::now()->addMonths(10), 
            Carbon::now()->addMonths(11), 
            Carbon::now()->addMonths(12), 
            Carbon::now()->addMonths(13), 
            Carbon::now()->addMonths(14), 
            Carbon::now()->addMonths(15), 
            Carbon::now()->addMonths(16), 
            Carbon::now()->addMonths(17), 
            Carbon::now()->addMonths(18), 
            Carbon::now()->subMonths(1), 
            Carbon::now()->subMonths(2),
            Carbon::now()->subMonths(3), 
            Carbon::now()->subMonths(4), 
            Carbon::now()->subMonths(5), 
            Carbon::now()->subMonths(6), 
            Carbon::now()->subMonths(7), 
            Carbon::now()->subMonths(9),
            Carbon::now()->subMonths(10),
            Carbon::now()->subMonths(11),
            Carbon::now()->subMonths(13),
            Carbon::now()->subMonths(14),
            Carbon::now()->subMonths(15),
            Carbon::now()->subMonths(16),
            Carbon::now()->subMonths(17),
            Carbon::now()->subMonths(18),
        ];

        return [
            'condition' => $faker->randomElement(Property::$conditions),
            'user_id' => $faker->numberBetween(1, 4560),
            'address' => $faker->address(),
            'price' => $faker->numberBetween(2000, 11000),
            'action' => $faker->randomElement(array_keys(Property::$actions)),
            'country_id' => $faker->numberBetween(1, 240),
            'bedrooms' => $faker->numberBetween(3, 5),
            'status' => $faker->randomElement(Property::$status),
            'toilets' => $faker->numberBetween(4, 11),
            'bathrooms' => $faker->numberBetween(3, 15),
            'image' => $faker->imageUrl($width = 960, $height = 1024),
            'category_id' => $faker->numberBetween(1, 5),
            'house_id' => $faker->numberBetween(1, 7),
            'state_id' => $faker->numberBetween(1, 700),
            'reference' => \Str::uuid(),
            'views' => $faker->numberBetween(78, 534),
            'measurement' => $faker->numberBetween(500, 6500),
            'city' => $faker->city(),
            'additional' => $faker->paragraph(15),
            'created_at' => $faker->randomElement($timestamps),
        ];
    }
}
