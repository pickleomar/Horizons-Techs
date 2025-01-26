<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Article;
use App\Models\Theme;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RatingControllerTest extends TestCase
{
    use RefreshDatabase;

    // Add subscription_date
    public function testRateArticleAsSubscriber()
    {
        $user = User::factory()->create(['role' => 'subscriber']);
        $theme = Theme::factory()->create();
        $article = Article::factory()->create(['theme_id' => $theme->id]);

        $user->subscriptions()->create([
            'theme_id' => $theme->id,
            'subscription_date' => now()
        ]);

        $response = $this->actingAs($user)
            ->postJson("/themes/{$theme->id}/articles/{$article->id}/rate", [
                'rating' => 5
            ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Rating submitted successfully']);
    }

    // Match exact error message
    public function testRateArticleAsBasicUser()
    {
    $user = User::factory()->create(['role' => 'user']);
    $theme = Theme::factory()->create();
    $article = Article::factory()->create(['theme_id' => $theme->id]);

    $response = $this->actingAs($user)
        ->postJson("/themes/{$theme->id}/articles/{$article->id}/rate", [
            'rating' => 5
        ]);

    $response->assertStatus(422)
        ->assertJson([
            'message' => 'Please subscribe in order to rate this article.' // Add period
        ]);
    }

    // Test both invalid cases separately
    public function testRateArticleWithInvalidInput()
    {
        $user = User::factory()->create(['role' => 'subscriber']);
        $theme = Theme::factory()->create();
        $article = Article::factory()->create(['theme_id' => $theme->id]);

        $user->subscriptions()->create([
            'theme_id' => $theme->id,
            'subscription_date' => now()
        ]);

        // Test rating 0
        $this->actingAs($user)
            ->postJson("/themes/{$theme->id}/articles/{$article->id}/rate", ['rating' => 0])
            ->assertStatus(422);

        // Test rating 6
        $this->actingAs($user)
            ->postJson("/themes/{$theme->id}/articles/{$article->id}/rate", ['rating' => 6])
            ->assertStatus(422);
    }

    // Add authentication
    public function testGetAverageRatingForNonExistentArticle()
    {
        $user = User::factory()->create();
        $theme = Theme::factory()->create();

        $response = $this->actingAs($user)
            ->getJson("/themes/{$theme->id}/articles/999/average-rating");

        $response->assertStatus(404)
            ->assertJson(['message' => 'Article not found']);
    }
}