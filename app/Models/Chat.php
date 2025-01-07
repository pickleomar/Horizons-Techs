<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'article_id',
        'user_id',
        'message',
        'message_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}