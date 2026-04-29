<?php

namespace App\Http\Controllers;

use App\Models\Painting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PaintingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paintings = Painting::orderBy('created_at', 'desc')->with('user')->with('likes')->get();

        return view('paintings.index', ['paintings' => $paintings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paintings.create');
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
            'dimensions' => 'nullable|string|max:50',
            'year' => 'nullable|integer|min:1800|max:2026',
            'category' => 'nullable|in:acrylique,gouache,aquarelle,huile',
        ]);

        $user = $request->user();
        $painting = new Painting();

        $painting->title = $validated['title'];
        $painting->description = $validated['description'];
        $painting->dimensions = $validated['dimensions'];
        $painting->year = $validated['year'];
        $painting->category = $validated['category'];

        // Upload de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('artworks', 'public');
            $painting->image_path = $imagePath;
        }

        $painting->user()->associate($user);
        $painting->save();

        return redirect("/paintings/$painting->id");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $painting = Painting::with('user')->with('likes')->findOrFail($id);

        $user = Auth::user();
        $reaction = null;

        if ($user) {
            $reaction = $painting->likes()->where('user_id', $user->id)->first();

            // Vérifie si la personne a déjà liké cette peinture
            if ($reaction) {
                // Récupère la réaction a la peinture
                $reaction = $reaction->pivot->reaction;
            }
        }

        return view('paintings.show', ['painting' => $painting, 'reaction' => $reaction]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $painting = Painting::findOrFail($id);

        Gate::authorize('update', $painting);

        return view('paintings.edit', ['painting' => $painting]);
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
            'dimensions' => 'nullable|string|max:50',
            'year' => 'nullable|integer|min:1800|max:2026',
            'category' => 'nullable|in:acrylique,gouache,aquarelle,huile',
        ]);

        $painting = Painting::findOrFail($id);

        Gate::authorize('update', $painting);

        $painting->title = $validated['title'];
        $painting->description = $validated['description'];
        $painting->dimensions = $validated['dimensions'];
        $painting->year = $validated['year'];
        $painting->category = $validated['category'];

        // Gestion de la nouvelle image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($painting->image_path && Storage::disk('public')->exists($painting->image_path)) {
                Storage::disk('public')->delete($painting->image_path);
            }

            // Upload de la nouvelle image
            $imagePath = $request->file('image')->store('artworks', 'public');
            $painting->image_path = $imagePath;
        }

        $painting->save();

        return redirect("/paintings/$painting->id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $painting = Painting::findOrFail($id);

        Gate::authorize('delete', $painting);

        // Supprimer l'image associée
        if ($painting->image_path && Storage::disk('public')->exists($painting->image_path)) {
            Storage::disk('public')->delete($painting->image_path);
        }

        $painting->delete();

        return redirect("/paintings");
    }
}
