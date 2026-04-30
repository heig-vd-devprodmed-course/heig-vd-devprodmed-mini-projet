<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Painting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ApiPaintingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paintings = Painting::orderBy('created_at', 'desc')->with('user')->with('likes')->get()
                ->map(function ($painting) {
                $painting->image_url = $painting->image_path
                    ? asset('storage/' . $painting->image_path)
                    : null;;
                return $painting; //retourne url complète
            });
        return $paintings;

        return response()->json($paintings, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string|max:5000',
            'category' => 'nullable|in:acrylique,gouache,aquarelle,huile',
            'dimensions' => 'nullable|string|max:50',
            'year'=> 'nullable|integer|min:1800|max:2026',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $user = $request->user();
        $painting = new Painting();

        $painting->title = $validated['title'];
         $painting->description = $validated['description'];
        $painting->category = $validated['category'];
        $painting->dimensions = $validated['dimensions'];
        $painting->year = $validated['year'];
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('artworks', 'public');
            $painting->image_path = $imagePath; //upload image
        } //peut maintenant envoyer une img en muiltipart/form-data

        $painting->user()->associate($user);
        $painting->save();

        $painting->image_url = $painting->image_path
            ? asset('storage/' . $painting->image_path)
            : null;

        return response()->json($painting, 201); //created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $painting = Painting::with('user')->with('likes')->findOrFail($id);
        $painting->image_url = $painting->image_path
            ? asset('storage/' . $painting->image_path)
            : null;
        return response()->json($painting, 200); //ok
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string|max:5000',
            'category' => 'nullable|in:acrylique,gouache,aquarelle,huile',
            'dimensions' => 'nullable|string|max:50',
            'year' => 'nullable|integer|min:1800|max:2026',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $painting = Painting::findOrFail($id);

        Gate::authorize('update', $painting);

        $painting->title = $validated['title'];
        $painting->description = $validated['description'];
        $painting->category = $validated['category'];
        $painting->dimensions = $validated['dimensions'];
        $painting->year = $validated['year'];

        if ($request->hasFile('image')) {
            if ($painting->image_path && Storage::disk('public')->exists($painting->image_path)) {
                Storage::disk('public')->delete($painting->image_path);
            }
            $painting->image_path = $request->file('image')->store('artworks', 'public');
        }

        $painting->save();

        $painting->image_url = $painting->image_path
            ? asset('storage/' . $painting->image_path)
            : null;

        return response()->json($painting, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $painting = Painting::findOrFail($id);
        Gate::authorize('delete', $painting);

        if ($painting->image_path && Storage::disk('public')->exists($painting->image_path)) {
            Storage::disk('public')->delete($painting->image_path); //delete clen (aussi sur serveur)
        }

        $painting->delete();

        return response()->noContent();
    }
}
