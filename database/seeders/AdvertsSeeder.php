<?php

namespace Database\Seeders;
use App\Models\{Advert, User};
use Illuminate\Database\Seeder;

class AdvertsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advert::truncate();
        Advert::factory()->count(User::count() * 3)->create();
    }
}
