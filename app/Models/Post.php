<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    /**
     * Get the user that owns the post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the users who liked the post.
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes')->using(Like::class)->withTimestamps()->withPivot('reaction');
    }

    /**
     * Un post appartient à une seule catégorie.
     * Ex : la review de Elden Ring appartient à la catégorie "RPG"
     * C'est une relation "belongsTo" : 1 post → 1 catégorie
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
