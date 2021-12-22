<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Property;
   
class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::factory()->count(680)->create();
    }
}