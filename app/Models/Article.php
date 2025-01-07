<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'theme_id',
        'author_id',
        'status',
        'publication_date',
    ];


    /**
     * Get the author of the article.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the theme of the article.
     */
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}