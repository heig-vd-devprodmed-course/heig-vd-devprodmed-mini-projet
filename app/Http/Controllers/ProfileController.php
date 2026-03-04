<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();

        $posts = Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->with(['user', 'likes'])
            ->get();

        return view('profile', ['user' => $user, 'posts' => $posts]);
    }
}
