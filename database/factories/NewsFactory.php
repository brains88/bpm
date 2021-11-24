<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;
use Faker\Factory as Faker;

class NewsFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'title' => $faker->sentence(),
            'user_id' => $faker->numberBetween(1, 200),
            'views' => $faker->numberBetween(103, 765),
            'published' => $faker->boolean(40), //40% chance of get true
            'image' => $faker->imageUrl($width = 1260, $height = 960, 'Real Estate', true, 'News'),
            'category_id' => $faker->numberBetween(1, 12),
            'description' => $faker->paragraph(25),
        ];
    }
}
