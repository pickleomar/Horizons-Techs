<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';

    protected $fillable = [
        'user_id',
        'article_id',
        'consultation_date',
    ];


    /**
     * Get the user that the histoy belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the article that the histoy belongs to.
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}