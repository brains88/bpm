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
        $faker = Faker::create();
        $users = [
            ['name' => 'Jesmine Alfred', 'phone' => $faker->phoneNumber(), 'email' => 'admin@admin.io', 'role' => 'admin', 'password' => Hash::make('1234'), 'status' => 1],
            ['name' => 'Washington Main', 'phone' => $faker->phoneNumber(), 'email' => 'user@user.io', 'role' => 'user', 'password' => Hash::make('1234'), 'status' => 1]
        ];

        User::factory()->count(1045)->create();
        foreach ($users as $user) {
            User::create($user);
        }

    }
}
