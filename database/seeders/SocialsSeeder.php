<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{Social, User};

class SocialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social::truncate();
        Social::factory()->count(User::count())->create();
    }
}
