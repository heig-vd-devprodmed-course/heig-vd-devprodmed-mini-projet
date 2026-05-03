<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Affiche la liste de tous les posts.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
                     ->with('user')
                     ->with('likes')
                     ->with('category') // On charge aussi la catégorie de chaque post
                     ->get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Affiche le formulaire de création d'un post.
     * On passe toutes les catégories à la vue pour le menu déroulant.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('posts.create', ['categories' => $categories]);
    }

    /**
     * Enregistre un nouveau post en base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'nullable|string|max:255',
            'content'     => 'required|string|max:5000',
            'category_id' => 'nullable|exists:categories,id', // l'id doit exister dans categories
        ]);

        $user = $request->user();
        $post = new Post();

        $post->title       = $validated['title'];
        $post->content     = $validated['content'];
        $post->category_id = $validated['category_id']; // on sauvegarde la catégorie choisie
        $post->user()->associate($user);

        $post->save();

        return redirect("/posts/$post->id");
    }

    /**
     * Affiche un post spécifique avec ses likes et sa catégorie.
     */
    public function show(string $id)
    {
        $post = Post::with('user')
                    ->with('likes')
                    ->with('category') // On charge la catégorie du post
                    ->findOrFail($id);

        $user = Auth::user();
        $reaction = null;

        if ($user) {
            $reaction = $post->likes()->where('user_id', $user->id)->first();

            if ($reaction) {
                $reaction = $reaction->pivot->reaction;
            }
        }

        return view('posts.show', ['post' => $post, 'reaction' => $reaction]);
    }

    /**
     * Affiche le formulaire d'édition d'un post.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        Gate::authorize('update', $post);

        // On passe les catégories pour que le <select> soit rempli
        $categories = Category::orderBy('name')->get();

        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Met à jour un post existant en base de données.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title'       => 'nullable|string|max:255',
            'content'     => 'required|string|max:5000',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);

        Gate::authorize('update', $post);

        $post->title       = $validated['title'];
        $post->content     = $validated['content'];
        $post->category_id = $validated['category_id'];

        $post->save();

        return redirect("/posts/$post->id");
    }

    /**
     * Supprime un post de la base de données.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        Gate::authorize('delete', $post);

        $post->delete();

        return redirect("/posts");
    }
}
