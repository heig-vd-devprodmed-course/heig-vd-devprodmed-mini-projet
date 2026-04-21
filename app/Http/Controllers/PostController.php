<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $user = $request->user();
        $post = new Post();

        $post->title = $validated['title'];
        $post->description = $validated['description'];

        // Upload de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('artworks', 'public');
            $post->image_path = $imagePath;
        }

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

        Gate::authorize('update', $post);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $post = Post::findOrFail($id);

        Gate::authorize('update', $post);

        $post->title = $validated['title'];
        $post->description = $validated['description'];

        // Gestion de la nouvelle image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
                Storage::disk('public')->delete($post->image_path);
            }

            // Upload de la nouvelle image
            $imagePath = $request->file('image')->store('artworks', 'public');
            $post->image_path = $imagePath;
        }

        $post->save();

        return redirect("/posts/$post->id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        Gate::authorize('delete', $post);

        // Supprimer l'image associée
        if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return redirect("/posts");
    }
}
