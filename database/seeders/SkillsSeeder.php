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
        $skills = ['Plumbing', 'Painting', 'Carpentry', 'Plumbing', 'Air Condition Technician'];

        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill,
                'status' => $faker->boolean(40)
            ]);
        }
    }
}
