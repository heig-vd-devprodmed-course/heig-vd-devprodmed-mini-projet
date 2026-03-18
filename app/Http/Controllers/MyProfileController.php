<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MyProfileController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        $user = Auth::user();

        return view('my-profile.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        $user = Auth::user();

        return view('my-profile.edit', ['user' => $user]);
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'username' => ['required', 'string', 'alpha_dash:ascii', 'min:2', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'profile_picture' => ['nullable', 'image', 'max:2048'], // 2MB max
        ]);

        $file = $request->file('profile_picture');

        // Vérifie si une image de profil a été téléversée
        if ($file) {
            // Vérifie si l'utilisateur.trice a une image de profil
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Stocke la nouvelle image de profil et récupère son chemin
            $path = Storage::disk('public')->put('profile-pictures', $file);

            // Remplace le champ profile_picture dans les données validées par le chemin de l'image stockée
            $validated['profile_picture'] = $path;
        }

        // Met à jour les informations de l'utilisateur.trice
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];

        // Si une image de profil a été téléversée, renseigne le chemin pour y accéder
        if (isset($validated['profile_picture'])) {
            $user->profile_picture = $validated['profile_picture'];
        }

        $user->save();

        return redirect('/my-profile');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy()
    {
        $user = Auth::user();

        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect('/');
    }
}
