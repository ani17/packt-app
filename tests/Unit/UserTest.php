<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_rendered_sucessfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user); // Acting as Authenticated user

        $response = $this->json('GET','users/');
        $response->assertStatus(200);
    }

    public function test_user_created_sucessfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $faker = \Faker\Factory::create();
        $gender = $faker->randomElement(['male', 'female']);
        $password = Hash::make('admin@123');

        $payload = [
            'name' => 'Test User',
            'email' => 'test_user@test.com',
            'password' => $password,
            'gender' => $gender == 'male' ? 'M' : 'F',
            'status' => 1,
            'address_line1' => $faker->buildingNumber,
            'address_line2' => $faker->streetAddress,
            'city' => $faker->city,
            'country' => $faker->country,
        ];

        $response = $this->json('POST','/users',$payload);

        $response->assertRedirect('/users');
    }

    public function test_user_edited_sucessfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $faker = \Faker\Factory::create();
        $gender = $faker->randomElement(['male', 'female']);

        /* Create Fake user */
        $userId = User::create([
            'name' => 'Test User',
            'email' => 'test_user@test.com',
            'password' => Hash::make('admin@123'),
            'gender' => 'M',
            'status' => 1,
            'address_line1' => $faker->buildingNumber,
            'address_line2' => $faker->streetAddress,
            'city' => $faker->city,
            'country' => $faker->country,
        ])->id;
        
        $user = User::find($userId);

        /* Update this fake user */

        $payload = [
            'name' => 'New User',
            'email' => 'new_user@test.com',
            'password' => Hash::make('newpassword@123'),
            'gender' => $gender == 'male' ? 'M' : 'F',
            'status' => 0,
            'address_line1' => $faker->buildingNumber,
            'address_line2' => $faker->streetAddress,
            'city' => $faker->city,
            'country' => $faker->country,
        ];

        $response = $this->json('PUT','/users/'.$user->id, $payload);

        $response->assertRedirect('/users');
    }

    public function test_user_deleted_sucessfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $faker = \Faker\Factory::create();

        /* Create Fake user */
        $userId = User::create([
            'name' => 'Sample User',
            'email' => 'sample_user@test.com',
            'password' => Hash::make('admin@123'),
            'gender' => 'M',
            'status' => 1,
            'address_line1' => $faker->buildingNumber,
            'address_line2' => $faker->streetAddress,
            'city' => $faker->city,
            'country' => $faker->country,
        ])->id;
        
        $user = User::find($userId);

        $response = $this->json('DELETE','/users/'.$user->id);

        $response->assertRedirect('/users');
    }
}
