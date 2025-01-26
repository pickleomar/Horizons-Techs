<?php

namespace App\Services;

use App\Models\Rating;
use App\Models\User;
use App\Models\Article;
use Illuminate\Validation\ValidationException;

class RatingService
{
    /**
     * Check if the user can rate the article.
     */
    public function canUserRateArticle(User $user, Article $article): bool
    {
        if ($user->isSubscriber()) {
            return $user->isSubscribedToTheme($article->theme_id);
        }

        return $user->isAdmin() || $user->isEditor();
    }

    /**
     * Update or create a rating for the article.
     */
    public function updateOrCreateRating($userId, $articleId, $rating)
    {
        // Validate the rating value
        if ($rating < 1 || $rating > 5) {
            throw ValidationException::withMessages([
                'rating' => 'Rating must be between 1 and 5.'
            ]);
        }

        // Update or create the rating
        Rating::updateOrCreate(
            [
                'user_id' => $userId,
                'article_id' => $articleId
            ],
            [
                'rating' => $rating
            ]
        );
    }

    /**
     * Get the average rating for an article.
     */
    public function getAverageRating($articleId)
    {
        return Rating::where('article_id', $articleId)->avg('rating');
    }

    /**
     * Get the total number of ratings for an article.
     */
    public function getTotalRatings($articleId)
    {
        return Rating::where('article_id', $articleId)->count();
    }
}