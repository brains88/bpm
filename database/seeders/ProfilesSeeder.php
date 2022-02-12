<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Profile;
   
class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();
        Profile::factory()->count(54)->create();
    }
}