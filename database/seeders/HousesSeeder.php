<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\House;
use Faker\Factory as Faker;
   
class HousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $houses = [
            ['type' => 'Duplex', 'category' => $faker->numberBetween(1, 7)],
            ['type' => 'Bungalow', 'category' => $faker->numberBetween(1, 7)],
            ['type' => 'flat', 'category' => $faker->numberBetween(1, 7)], 
            ['type' => 'self contain', 'category' => $faker->numberBetween(1, 7)],
            ['type' => 'One room', 'category' => $faker->numberBetween(1, 7)],
            ['type' => 'Storey building', 'category' => $faker->numberBetween(1, 7)], 
            ['type' => 'plaza', 'category' => $faker->numberBetween(1, 7)], 
            ['type' => 'shop', 'category' => $faker->numberBetween(1, 7)], 
            ['type' => 'event center', 'category' => $faker->numberBetween(1, 7)]
        ];

        foreach ($houses as $house) {
            House::create([
                'type' => $house['type'], 
                'category_id' => $house['category']
            ]);
        }
    }
}