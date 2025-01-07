<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
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
}