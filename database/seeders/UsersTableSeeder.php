<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        $password = Hash::make('toptal');

        $gender = $faker->randomElement(['male', 'female']);
        
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
            'gender' => $gender == 'male' ? 'M' : 'F',
            'status' => 1,
            'address_line1' => $faker->buildingNumber,
            'address_line2' => $faker->streetAddress,
            'city' => $faker->city,
            'country' => $faker->country,
        ]);

        for ($i = 0; $i < 4; $i++) {
            User::create([
                'name' => $faker->name($gender),
                'email' => $faker->email,
                'password' => $password,
                'gender' => $gender == 'male' ? 'M' : 'F',
                'status' => 1,
                'address_line1' => $faker->buildingNumber,
                'address_line2' => $faker->streetAddress,
                'city' => $faker->city,
                'country' => $faker->country,
            ]);
        }
    }
}
