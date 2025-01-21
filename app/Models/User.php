<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    public const ROLE_HIERARCHY = [
        'user' => 1,
        'subscriber' => 2,
        'admin' => 3,
        'super-admin' => 4,
    ];


    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "role",
        'provider',
        'provider_id',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Get the articles for the user.
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }


    /**
     * Get the histories for the user.
     */
    public function histories()
    {
        return $this->hasMany(History::class);
    }

    /**
     * Get the themes for the user.
     */
    public function themes()
    {
        return $this->hasMany(Theme::class, "manager_id");
    }

    /**
     * Get the subscriptions for the user.
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }


    /**
     * Get the ratings for the user.
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }



    /**
     * Get the chats for the user.
     */
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }


    /**
     * Check if the user is subscribed to a theme
     */

    public function isSubscribedToTheme($theme_id)
    {
        return $this->subscriptions()->where('theme_id', $theme_id)->exists();
    }



    /**
     * Check if the user is user
     */
    public function isUser()
    {
        return $this->role === 'user';
    }

    /**
     * Check if the user is Subscriber
     */

    public function isSubscriber()
    {
        return $this->role === 'subscriber';
    }

    /**
     * Check if the user is Admin
     */

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the user is Super Admin
     */

    public function isEditor()
    {
        return $this->role === 'editor';
    }

    /**
     * Check if the user role
     */


    public function hasRole($role): bool
    {
        $userRoleLevel = self::ROLE_HIERARCHY[$this->role] ?? 0;
        $requiredRoleLevel = self::ROLE_HIERARCHY[$role] ?? 0;

        return $userRoleLevel >= $requiredRoleLevel;
    }
}