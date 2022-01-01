<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Visitor;

class VisitorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visitor::truncate();
        Visitor::factory()->count(1946)->create();
    }
}
