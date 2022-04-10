<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class PostAPITest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_posts_fetched_successfully()
    {
        $user = User::factory()->create();
        $token = $user->createToken('myapptoken')->plainTextToken;
        $headers = ['Authorization' => 'Bearer ' . $token];

        $response = $this->json('GET','api/posts', [], $headers)
        ->assertStatus(200)
        ->assertJsonStructure([
            '*' => ['id', 'title', 'body', 'user_id', 'created_at', 'updated_at']
        ]);
    }

    public function test_post_fetched_successfully()
    {
        $user = User::factory()->create();
        
        $token = $user->createToken('myapptoken')->plainTextToken;
        $headers = ['Authorization' => 'Bearer ' . $token];

        $response = $this->json('GET','api/posts/'.$user->id, [], $headers)
        ->assertStatus(200)
        ->assertJsonStructure(
            ['id', 'title', 'body', 'user_id', 'created_at', 'updated_at']
        );
    }
}
