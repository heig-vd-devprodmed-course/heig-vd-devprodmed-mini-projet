<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
        'season_id',
        'number',
        'title',
        'synopsis',
        'image_url',
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
