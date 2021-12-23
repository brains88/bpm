<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::truncate();
        Plan::factory()->count(13)->create();
    }
}
