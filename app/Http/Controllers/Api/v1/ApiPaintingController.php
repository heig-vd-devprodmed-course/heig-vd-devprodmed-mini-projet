<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Painting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApiPaintingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paintings = Painting::orderBy('created_at', 'desc')->with('user')->with('likes')->get();

        return $paintings;
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
        $painting = new Painting();

        $painting->title = $validated['title'];
        $painting->content = $validated['content'];
        $painting->user()->associate($user);

        $painting->save();

        return $painting;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $painting = Painting::with('user')->with('likes')->findOrFail($id);

        return $painting;
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

        $painting = Painting::findOrFail($id);

        Gate::authorize('update', $painting);

        $painting->title = $validated['title'];
        $painting->content = $validated['content'];

        $painting->save();

        return $painting;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $painting = Painting::findOrFail($id);

        Gate::authorize('delete', $painting);

        $painting->delete();

        return response()->noContent();
    }
}
