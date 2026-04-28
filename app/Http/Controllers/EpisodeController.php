<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Rating;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(Season $season)
    {
        $episodes = $season->episodes;

        return view('episodes.index', compact('season', 'episodes'));
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function show(Episode $episode)
    {
        $userRating = null;

        if (auth()->check()) {
            $userRating = $episode->ratings()
                ->where('user_id', auth()->id())
                ->first();
        }

        //calcule la moyenne directement en base SQL
        // null s’il n’y a aucun vote
        $averageRating = $episode->ratings()->avg('rating');

        return view('episodes.show', compact(
            'episode',
            'userRating',
            'averageRating'
        ));

    }
}
