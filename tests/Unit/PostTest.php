<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_post_rendered_sucessfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user); // Acting as Authenticated user

        $response = $this->json('GET','posts/');
        $response->assertStatus(200);
    }

    public function test_post_created_sucessfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $payload = [
            'title' => 'Some title',
            'body' => 'Some Body',
            'user_id' => $user->id
        ];

        $response = $this->json('POST','/posts',$payload);

        $response->assertRedirect('/posts');
    }

    public function test_post_edited_sucessfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $faker = \Faker\Factory::create();

        /* Create Fake post for user */
        $postId = Post::create([
            'title' => $faker->sentence,
            'body' => $faker->paragraph,
            'user_id' => $user->id
        ])->id;
        
        $post = Post::find($postId);

        /* Update the same post for user */

        $payload = [
            'title' => 'New title',
            'body' => 'New Body',
            'user_id' => $user->id
        ];

        $response = $this->json('PUT','/posts/'.$post->id, $payload);

        $response->assertRedirect('/posts');
    }

    public function test_post_deleted_sucessfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $faker = \Faker\Factory::create();

        /* Create Fake post for user */
        $postId = Post::create([
            'title' => $faker->sentence,
            'body' => $faker->paragraph,
            'user_id' => $user->id
        ])->id;
        
        $post = Post::find($postId);

        $response = $this->json('DELETE','/posts/'.$post->id);

        $response->assertRedirect('/posts');
    }

    
}
