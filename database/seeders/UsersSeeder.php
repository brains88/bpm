<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = Faker::create();
        $users = [
            ['name' => $faker->name(), 'phone' => $faker->phoneNumber(), 'email' => 'admin@admin.io', 'role' => 'admin', 'password' => Hash::make('1234'), 'status' => 'active'],
            ['name' => $faker->name(), 'phone' => $faker->phoneNumber(), 'email' => $faker->unique()->safeEmail(), 'role' => 'admin', 'password' => Hash::make('1234'), 'status' => 'inactive'],
            ['name' => $faker->name(), 'phone' => '08158212666', 'email' => 'user@user.io', 'role' => 'user', 'password' => Hash::make('1234'), 'status' => 'active'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        User::factory()->count(312)->create();
    }
}
