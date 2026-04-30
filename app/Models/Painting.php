<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Painting extends Model
{

        protected $fillable = [ //sécurité, quels champs autorisés
            'title',
            'description',
            'category',
            'dimensions',
            'year',
            'image_path',
        ];
    /**
     * Get the user that owns the painting.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the users who liked the painting.
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes')->using(Like::class)->withTimestamps()->withPivot('reaction');
    }
}
