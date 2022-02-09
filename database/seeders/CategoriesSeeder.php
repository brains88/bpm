<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
   
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'business', 'type' => 'blog'], 
            ['name' => 'real estate', 'type' => 'blog'], 
            ['name' => 'ecommerce', 'type' => 'blog'],
            ['name' => 'construction', 'type' => 'blog'],
            ['name' => 'politics', 'type' => 'news'],
            ['name' => 'agency', 'type' => 'news'],
            ['name' => 'marketing', 'type' => 'news'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}