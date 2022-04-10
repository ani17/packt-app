<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserAPITest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_users_fetched_successfully()
    {
        $user = User::factory()->create();
        $token = $user->createToken('myapptoken')->plainTextToken;
        $headers = ['Authorization' => 'Bearer ' . $token];

        $response = $this->json('GET','api/users', [], $headers)
        ->assertStatus(200)
        ->assertJsonStructure([
            '*' => ['id', 'name', 'email', 'gender', 'status', 'address_line1', 'address_line2', 'city', 'country', 'created_at', 'updated_at']
        ]);
    }

    public function test_user_fetched_successfully()
    {
        $user = User::factory()->create();
        
        $token = $user->createToken('myapptoken')->plainTextToken;
        $headers = ['Authorization' => 'Bearer ' . $token];

        $response = $this->json('GET','api/users/'.$user->id, [], $headers)
        ->assertStatus(200)
        ->assertJsonStructure(
            ['id', 'name', 'email', 'gender', 'status', 'address_line1', 'address_line2', 'city', 'country', 'created_at', 'updated_at']
        );
    }
}
