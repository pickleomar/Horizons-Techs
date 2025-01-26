<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Article;
use App\Models\Theme;
use App\Models\Rating;
use App\Services\RatingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;

class RatingServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $ratingService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ratingService = new RatingService();
    }

    /**
     * Test if a subscriber can rate an article in a subscribed theme.
     */
    public function testSubscriberCanRateArticleInSubscribedTheme()
    {
        $user = User::factory()->create(['role' => 'subscriber']);
        $theme = Theme::factory()->create();
        $article = Article::factory()->create(['theme_id' => $theme->id]);

        // Simulate subscription
        $user->subscriptions()->create(
            ['theme_id' => $theme->id,
            'subscription_date' => now(),]); 

        $this->assertTrue($this->ratingService->canUserRateArticle($user, $article));
    }

    /**
     * Test if a subscriber cannot rate an article in an unsubscribed theme.
     */
    public function testSubscriberCannotRateArticleInUnsubscribedTheme()
    {
        $user = User::factory()->create(['role' => 'subscriber']);
        $theme = Theme::factory()->create();
        $article = Article::factory()->create(['theme_id' => $theme->id]);

        $this->assertFalse($this->ratingService->canUserRateArticle($user, $article));
    }

    /**
     * Test if an admin can rate any article.
     */
    public function testAdminCanRateAnyArticle()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $article = Article::factory()->create();

        $this->assertTrue($this->ratingService->canUserRateArticle($user, $article));
    }

    /**
     * Test if an editor can rate any article.
     */
    public function testEditorCanRateAnyArticle()
    {
        $user = User::factory()->create(['role' => 'editor']);
        $article = Article::factory()->create();

        $this->assertTrue($this->ratingService->canUserRateArticle($user, $article));
    }

    /**
     * Test if a basic user cannot rate an article.
     */
    public function testBasicUserCannotRateArticle()
    {
        $user = User::factory()->create(['role' => 'user']);
        $article = Article::factory()->create();

        $this->assertFalse($this->ratingService->canUserRateArticle($user, $article));
    }

    /**
     * Test updating or creating a rating.
     */
    public function testUpdateOrCreateRating()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create();

        $this->ratingService->updateOrCreateRating($user->id, $article->id, 5);

        $this->assertDatabaseHas('ratings', [
            'user_id' => $user->id,
            'article_id' => $article->id,
            'rating' => 5
        ]);
    }

    /**
     * Test getting the average rating for an article.
     */
    public function testGetAverageRating()
    {
        $article = Article::factory()->create();
        Rating::factory()->create(['article_id' => $article->id, 'rating' => 4]);
        Rating::factory()->create(['article_id' => $article->id, 'rating' => 5]);

        $averageRating = $this->ratingService->getAverageRating($article->id);

        $this->assertEquals(4.5, $averageRating);
    }

    /**
     * Test getting the total number of ratings for an article.
     */
    public function testGetTotalRatings()
    {
        $article = Article::factory()->create();
        Rating::factory()->count(3)->create(['article_id' => $article->id]);

        $totalRatings = $this->ratingService->getTotalRatings($article->id);

        $this->assertEquals(3, $totalRatings);
    }

    /**
     * Test invalid rating values.
     */

    public function testInvalidRatingValues()
    {
        $user = User::factory()->create(['role' => 'subscriber']);
        $theme = Theme::factory()->create();
        $article = Article::factory()->create(['theme_id' => $theme->id]);
    
        // Simulate subscription with subscription_date
        $user->subscriptions()->create([
            'theme_id' => $theme->id,
            'subscription_date' => now(),
        ]);
    
        // Test rating less than 1
        try {
            $this->ratingService->updateOrCreateRating($user->id, $article->id, 0);
            $this->fail('Expected ValidationException was not thrown for rating < 1.');
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('rating', $e->errors());
        }
    
        // Test rating greater than 5
        try {
            $this->ratingService->updateOrCreateRating($user->id, $article->id, 6);
            $this->fail('Expected ValidationException was not thrown for rating > 5.');
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('rating', $e->errors());
        }
    }

    /**
     * Test updating an existing rating.
     */
    public function testUpdateExistingRating()
    {
        $user = User::factory()->create(['role' => 'subscriber']);
        $theme = Theme::factory()->create();
        $article = Article::factory()->create(['theme_id' => $theme->id]);

        // Simulate subscription
        $user->subscriptions()->create([
            'theme_id' => $theme->id,
            'subscription_date' => now(), 
        ]);

        // Create initial rating
        $this->ratingService->updateOrCreateRating($user->id, $article->id, 3);

        // Update the rating
        $this->ratingService->updateOrCreateRating($user->id, $article->id, 5);

        $this->assertDatabaseHas('ratings', [
            'user_id' => $user->id,
            'article_id' => $article->id,
            'rating' => 5
        ]);
    }

    /**
     * Test getting average rating for an article with no ratings.
     */
    public function testGetAverageRatingWithNoRatings()
    {
        $article = Article::factory()->create();

        $averageRating = $this->ratingService->getAverageRating($article->id);

        $this->assertEquals(0, $averageRating);
    }
}