<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Chat;
use App\Models\Subscription;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ChatControllerTest extends TestCase
{
    use DatabaseTransactions;

    // Helper: Create subscriber with theme subscription
    protected function createSubscribedUser(Theme $theme): User
    {
        $user = User::factory()->create(['role' => 'subscriber']);
        Subscription::factory()->create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
        ]);
        return $user;
    }

    // Helper: Create theme admin
    protected function createThemeAdmin(Theme $theme): User
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $theme->update(['manager_id' => $admin->id]);
        return $admin;
    }

    

    #[Test]
    public function subscriber_can_post_to_subscribed_theme()
    {
        $theme = Theme::factory()->create();
        $user = $this->createSubscribedUser($theme);
        $article = Article::factory()->create(['theme_id' => $theme->id]);

        $response = $this->actingAs($user)
            ->post(route('chats.store'), [
                'message' => 'Test message',
                'article_id' => $article->id,
            ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('chats', [
            'user_id' => $user->id,
            'article_id' => $article->id,
            'message' => 'Test message',
        ]);
    }

    

    #[Test]
    public function subscriber_cannot_post_to_unsubscribed_theme()
    {
        $theme = Theme::factory()->create();
        $user = User::factory()->create(['role' => 'subscriber']); // No subscription
        $article = Article::factory()->create(['theme_id' => $theme->id]);

        $response = $this->actingAs($user)
            ->post(route('chats.store'), [
                'message' => 'Test message',
                'article_id' => $article->id,
            ]);

        $response->assertForbidden();
        $this->assertDatabaseMissing('chats', ['message' => 'Test message']);
    }

    

    #[Test]
    public function non_subscriber_cannot_post()
    {
        $user = User::factory()->create(['role' => 'user']);
        $article = Article::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('chats.store'), [
                'message' => 'Test message',
                'article_id' => $article->id,
            ]);

        $response->assertForbidden();
    }

    

    #[Test]
    public function admin_can_delete_message_in_their_theme()
    {
        $theme = Theme::factory()->create();
        $admin = $this->createThemeAdmin($theme);
        $article = Article::factory()->create(['theme_id' => $theme->id]);
        $chat = Chat::factory()->create(['article_id' => $article->id]);

        $response = $this->actingAs($admin)
            ->delete(route('chats.destroy', $chat));

        $response->assertRedirect();
        $this->assertDatabaseMissing('chats', ['id' => $chat->id]);
    }

    

    #[Test]
    public function admin_cannot_delete_message_in_other_theme()
    {
        $theme1 = Theme::factory()->create();
        $theme2 = Theme::factory()->create();
        $admin = $this->createThemeAdmin($theme1);
        $article = Article::factory()->create(['theme_id' => $theme2->id]);
        $chat = Chat::factory()->create(['article_id' => $article->id]);

        $response = $this->actingAs($admin)
            ->delete(route('chats.destroy', $chat));

        $response->assertForbidden();
        $this->assertDatabaseHas('chats', ['id' => $chat->id]);
    }

    

    #[Test]
    public function editor_can_delete_any_message()
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $chat = Chat::factory()->create();

        $response = $this->actingAs($editor)
            ->delete(route('chats.destroy', $chat));

        $response->assertRedirect();
        $this->assertDatabaseMissing('chats', ['id' => $chat->id]);
    }

    

    #[Test]
    public function regular_user_cannot_delete_message()
    {
        $user = User::factory()->create(['role' => 'user']);
        $theme = Theme::factory()->create();
        $article = Article::factory()->create(['theme_id' => $theme->id]);
        $chat = Chat::factory()->create(['article_id' => $article->id]);

        $response = $this->actingAs($user)
            ->delete(route('chats.destroy', $chat));

        $response->assertForbidden();
        $this->assertDatabaseHas('chats', ['id' => $chat->id]);
    }
}