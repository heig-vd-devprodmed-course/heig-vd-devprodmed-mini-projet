<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Rating;


class RatingController extends Controller
{
    //

    public function store(Request $request, Episode $episode)
    {
        // Vérification serveur de la note
        $validated = $request->validate([
            'rating' => ['required', 'integer', 'between:1,5'],
        ]);

        // Vérifier si l'user a déjà voté pour cet épisode
        $alreadyRated = Rating::where('user_id', auth()->id())
            ->where('episode_id', $episode->id)
            ->exists();

        if ($alreadyRated) {
            return redirect()->back()
                ->withErrors([
                    'rating' => 'Vous avez déjà noté cet épisode.',
                ]);
        }

        // Création du vote
        Rating::create([
            'user_id' => auth()->id(),
            'episode_id' => $episode->id,
            'rating' => $validated['rating'],
        ]);

        return redirect()->back()
            ->with('success', 'Votre note a été enregistrée.');
    }

}
