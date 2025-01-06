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
}
