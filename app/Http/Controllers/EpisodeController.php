<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(Season $season)
    {
        $episodes = $season->episodes;

        return view('episodes.index', compact('season', 'episodes'));
    }

    public function show(Episode $episode)
    {
        return view('episodes.show', compact('episode'));
    }
}
