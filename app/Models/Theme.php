<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'name',
        'description',
        'manager_id',
    ];


    public function manager()
    {
        return $this->belongsTo(User::class, "manager_id");
    }


    public function articles()
    {
        return $this->hasMany(Article::class);
    }


    public function subscriptions()
    {

        return $this->hasMany(Subscription::class);
    }
}