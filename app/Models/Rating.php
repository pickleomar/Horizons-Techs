<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    use HasFactory;

    protected $fillable = ['user_id', 'article_id', 'rating'];


    /**
     * Get the user that the rating belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get the artice that the rating belongs to.
     */
    public function  article()
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * 
     */
}
