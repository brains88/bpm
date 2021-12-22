<?php

namespace Database\Seeders;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
<<<<<<< HEAD
        $status = $faker->boolean(40);
        $skills = [
            ['name' => 'Plumber', 'status' => $status],
            ['name' => 'Solar installer', 'status' => $status],
            ['name' => 'Painter', 'status' => $status],
            ['name' => 'Carpenter', 'status' =>$status], 
            ['name' => 'Electrician', 'status' => $status], 
            ['name' => 'Air Condition Technician', 'status' => $status],
            ['name' => 'Pop installer', 'status' => $status],
            ['name' => 'Well driller', 'status' => $status],
            ['name' => 'Cctv installer', 'status' => $status],
            ['name' => 'Fabricator', 'status' => $status],
            ['name' => 'Landscaper', 'status' => $status],
            ['name' => 'Joiners', 'status' => $status],
            ['name' => 'Welder', 'status' => $status],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
=======
        $skills = ['Plumbing', 'Painting', 'Carpentry', 'Plumbing', 'Air Condition Technician'];

        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill,
                'status' => $faker->boolean(40)
            ]);
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
        }
    }
}
