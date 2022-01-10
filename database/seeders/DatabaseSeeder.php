<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesSeeder::class);
        $this->call(UsersSeeder::class);  
        $this->call(CategoriesSeeder::class);
        $this->call(HousesSeeder::class);
        $this->call(PropertiesSeeder::class);
        $this->call(BlogsSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(ImagesSeeder::class);
        
        $this->call(PlansSeeder::class);
        $this->call(VisitorsSeeder::class);
        $this->call(ContinentsSeeder::class);
        $this->call(SubscriptionsSeeder::class);

        $this->call(NewsSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(CurrenciesSeeder::class);
    }
}
