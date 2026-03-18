<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /**
     * Get the posts for the user.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the posts liked by the user.
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'likes')->using(Like::class)->withTimestamps()->withPivot('reaction');
    }
}
