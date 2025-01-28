<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Article;
use App\Models\Rating;
use App\Services\RatingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RatingController extends Controller
{
    protected $ratingService;

    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }

    /**
     * Rate an article based on user role and permissions.
     */
    public function rateArticle(Request $request, Theme $theme, Article $article)
    {
        // Validate input
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5'
        ]);

        $user = Auth::user();
        $rating = $validatedData['rating'];

        // Check if the user is authorized to rate the article
        if (!$this->ratingService->canUserRateArticle($user, $article)) {
            throw ValidationException::withMessages([
                'rating' => 'Please subscribe in order to rate this article.'
            ]);
        }

        // Update or create the rating
        $this->ratingService->updateOrCreateRating($user->id, $article->id, $rating);

        return redirect()->back()->with('success', 'Rating submitted successfully!');
    }
    //Retreive the existing user Rating and displays it
    public function getUserRating(Article $article){
        $user=Auth::user();
        return Rating::where('user_id', $user->id)->where('article_id',$article->id)->first();

    }

    /**
     * Get the average rating for an article.
     */

    public function getAverageRating(Theme $theme, $articleId)
    {
        try {
            $article = Article::findOrFail($articleId);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Article not found'
            ], 404);
        }

        // Rest of your existing logic
        $averageRating = $this->ratingService->getAverageRating($article->id);

        return response()->json([
            'article_id' => $article->id,
            'average_rating' => round($averageRating, 2),
            'total_ratings' => $this->ratingService->getTotalRatings($article->id)
        ]);
    }

    /**
     * Get the appropriate error message based on the user's role.
     */
    protected function getRatingErrorMessage($user)
    {
        if ($user->isUser()) {
            return 'Please subscribe in order to rate this article.';
        }

        if ($user->isSubscriber()) {
            return 'You can only rate articles in themes you are subscribed to.';
        }

        return 'You are not authorized to rate this article.';
    }

    
}
