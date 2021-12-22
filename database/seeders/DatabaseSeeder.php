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
<<<<<<< HEAD
    {
        $this->call(GlobesSeeder::class);
=======
    { 
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
        $this->call(UsersSeeder::class);  
        $this->call(CategoriesSeeder::class);
        $this->call(HousesSeeder::class);
        $this->call(PropertiesSeeder::class);
        $this->call(BlogsSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(ImagesSeeder::class);

        $this->call(NewsSeeder::class);
<<<<<<< HEAD
=======

        $this->call(ContinentsSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(DivisionsSeeder::class);
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
        $this->call(LanguagesSeeder::class);
    }
}
