<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{


    use HasFactory;
    /**
     * The Subscription model represents a subscription made by a user to a theme.
     *
     * @property int $user_id The ID of the user who made the subscription.
     * @property int $theme_id The ID of the theme to which the user subscribed.
     * @property string $subscription_date The date when the subscription was made.
     *
     * @method \Illuminate\Database\Eloquent\Relations\BelongsTo user() Get the user that owns the subscription.
     * @method \Illuminate\Database\Eloquent\Relations\BelongsTo theme() Get the theme that the subscription belongs to.
     */


    protected $primaryKey = ['user_id', 'theme_id'];
    public $incrementing = false;


    protected $fillable = [
        'user_id',
        'theme_id',
        'subscription_date',
        "feedback"
    ];

    /**
     * Get the user that owns the subscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the theme that the subscription belongs to.
     */
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
