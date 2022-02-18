<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{Gig, User};

class GigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gig::truncate();
        Gig::factory()->count(User::count() * 7)->create();
    }
}
