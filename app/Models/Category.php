<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Liste des colonnes qu'on autorise à remplir en masse
    // (protection contre les attaques de type "mass assignment")
    protected $fillable = ['name', 'slug'];

    /**
     * Une catégorie contient plusieurs posts.
     * Ex : la catégorie "RPG" a plusieurs reviews de jeux RPG.
     * C'est une relation "hasMany" : 1 catégorie → plusieurs posts
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
