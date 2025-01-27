<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Chat;
use App\Models\Article;

class ChatPolicy
{
    /**
     * Determine if a user can create a chat message.
     */
    public function create(User $user, Article $article): bool
    {
        // Subscriber must be subscribed to the article's theme
        return $user->isSubscriber() && $user->isSubscribedToTheme($article->theme_id);
    }

    /**
     * Determine if a user can delete a chat message.
     */
    public function delete(User $user, Chat $chat): bool
    {
        // Editor can delete any message
        if ($user->isEditor()) {
            return true;
        }

        // Admin can delete messages in their theme
        if ($user->isAdmin()) {
            return $user->themes()->where('id', $chat->article->theme_id)->exists();
        }

        // Deny access by default for regular users
        return false;
    }
}