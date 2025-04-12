<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that an unauthenticated user cannot create a post.
     */
    public function test_unauthenticated_user_cannot_create_post(): void
    {
        $response = $this->postJson('/api/posts', [
            'title' => 'Test Post',
            'content' => 'This is a test post content',
        ]);

        $response->assertStatus(401);
    }

    /**
     * Test that a user can retrieve their own posts.
     */
    public function test_user_can_retrieve_their_posts(): void
    {
        $user = User::factory()->create();
        $posts = Post::factory(3)->create(['user_id' => $user->id]);
        
        Sanctum::actingAs($user);

        $response = $this->getJson('/api/posts');

        $response->assertStatus(200)
                ->assertJsonCount(3);
    }
}
