<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    use HasFactory;
    protected $fillable = [
        'article_id',
        'user_id',
        'message',
        'message_date',
    ];

    /**
     * Get the user that the chat belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get the article that the chat belongs to.
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
