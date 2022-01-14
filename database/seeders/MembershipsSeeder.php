<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Membership;

class MembershipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Membership::truncate();
        Membership::factory()->count(13)->create();
    }
}
