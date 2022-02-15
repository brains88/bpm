<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Review;
   
class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::truncate();
        Review::factory()->count(4289)->create();
    }
}