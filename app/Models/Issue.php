<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'title',
        'description',
        'publication_date',
        'public',
    ];
    protected $casts = [
        'publication_date' => 'datetime',
    ];
    

    /**
     * Todo Handle Issue Relationship
     */
}
