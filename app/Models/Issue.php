<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'title',
        'description',
        "image",
        'publication_date',
        'public',
        "publisher"
    ];
    protected $casts = [
        'publication_date' => 'datetime',
    ];


    public function articles()
    {
        return $this->hasMany(Article::class);
    }


    public function owner()
    {
        return $this->belongsTo(User::class, "publisher_id");
    }
    /**
     * Todo Handle Issue Relationship
     */
}
