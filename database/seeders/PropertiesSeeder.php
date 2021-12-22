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
<<<<<<< HEAD
        Property::factory()->count(680)->create();
=======
        Property::factory()->count(80)->create();
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
    }
}