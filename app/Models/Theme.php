<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;
    /**
     * Class Theme
     *
     * @property string $name The name of the theme.
     * @property string $description A brief description of the theme.
     * @property int $manager_id The ID of the manager associated with the theme.
     *
     * @method \Illuminate\Database\Eloquent\Relations\BelongsTo manager() Defines a relationship where the theme belongs to a manager (User).
     * @method \Illuminate\Database\Eloquent\Relations\HasMany articles() Defines a relationship where the theme has many articles.
     * @method \Illuminate\Database\Eloquent\Relations\HasMany subscriptions() Defines a relationship where the theme has many subscriptions.
     */
    protected $fillable = [
        'name',
        'description',
        'manager_id',
    ];


    /**
     * Get the manager that owns the theme.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, "manager_id");
    }


    /**
     * Get the articles for the theme.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }



    /**
     * Get the subscriptions for the theme.
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
