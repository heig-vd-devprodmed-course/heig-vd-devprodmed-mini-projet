<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'reaction' => ['required', 'in:like,love,haha,wow,sad,angry'],
        ]);

        $post = Post::findOrFail($id);
        $user = $request->user();
        $reaction = $validated['reaction'];

        // Vérifie si la personne avait déjà liké ce post
        $existingLike = $post->likes()->where('user_id', $user->id)->first();

        if ($existingLike) {
            // Vérifie si la personne a sélectionné la même réaction que celle qu'elle avait déjà sélectionnée
            if ($existingLike->pivot->reaction === $reaction) {
                // Retire la réaction
                $post->likes()->detach($user->id);
            } else {
                // Met à jour la réaction avec la nouvelle réaction
                $post->likes()->updateExistingPivot($user->id, ['reaction' => $reaction]);
            }
        } else {
            // Like le post avec la réaction sélectionnée
            $post->likes()->attach($user->id, ['reaction' => $reaction]);
        }

        return redirect("/posts/$id");
    }
}
