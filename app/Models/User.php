<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the paintings for the user.
     */
    public function paintings(): HasMany
    {
        return $this->hasMany(Painting::class);
    }

    /**
     * Get the paintings liked by the user.
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Painting::class, 'likes')->using(Like::class)->withTimestamps()->withPivot('reaction');
    }
}
