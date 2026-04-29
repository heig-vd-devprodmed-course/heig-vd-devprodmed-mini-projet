<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $tokens = $user->tokens()->orderBy('created_at', 'desc')->get();

        return view('tokens.index', ['tokens' => $tokens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tokens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'scopes' => 'required|array|min:1',
            'scopes.*' => 'string|in:paintings:read,paintings:create,paintings:update,paintings:delete',
            'expiration_date' => 'nullable|date|after:today',
        ]);

        $user = $request->user();

        $token_name = $validated['name'];
        $token_scopes = $validated['scopes'] ?? [];
        $expiration_date = isset($validated['expiration_date']) ? now()->parse($validated['expiration_date'])->endOfDay() : null;

        $token = $user->createToken($token_name, $token_scopes, $expiration_date);

        return redirect('/tokens')->with('plain_text_token', $token->plainTextToken);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();

        $user->tokens()->where('id', $id)->delete();

        return redirect('/tokens');
    }
}
