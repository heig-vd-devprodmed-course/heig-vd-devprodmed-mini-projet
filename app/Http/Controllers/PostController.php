<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with('user')->with('likes')->get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'required|string|max:5000',
        ]);

        $user = $request->user();
        $post = new Post();

        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user()->associate($user);

        $post->save();

        return redirect("/posts/$post->id");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('user')->with('likes')->findOrFail($id);

        $user = Auth::user();
        $reaction = null;

        if ($user) {
            $reaction = $post->likes()->where('user_id', $user->id)->first();

            // Vérifie si la personne a déjà liké ce post
            if ($reaction) {
                // Récupère la réaction au post
                $reaction = $reaction->pivot->reaction;
            }
        }

        return view('posts.show', ['post' => $post, 'reaction' => $reaction]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'required|string|max:5000',
        ]);

        $post = Post::findOrFail($id);

        $post->title = $validated['title'];
        $post->content = $validated['content'];

        $post->save();

        return redirect("/posts/$post->id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);

        return redirect("/posts");
    }
}
