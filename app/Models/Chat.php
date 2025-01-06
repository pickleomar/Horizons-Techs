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
}
