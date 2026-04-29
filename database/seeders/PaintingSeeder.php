<?php

namespace Database\Seeders;

use App\Models\Painting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaintingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupère tous les utilisateurs existants
        $users = User::all();

        // Titres d'œuvres réalistes
        $titles = [
            'Coucher de soleil sur la montagne',
            'Paysage urbain moderne',
            'Portrait expressionniste',
            'Nature morte avec fruits',
            'Abstraction géométrique',
            'Paysage marin tempétueux',
            'Fleurs du jardin',
            'Ville de nuit',
            'Autoportrait introspectif',
            'Forêt mystérieuse',
        ];

        // Descriptions d'œuvres
        $descriptions = [
            'Une exploration des couleurs chaudes et de la lumière naturelle.',
            'Une vision contemporaine de l\'architecture urbaine et du mouvement.',
            'Étude des émotions humaines à travers les traits et les couleurs.',
            'Jeu subtil de lumière et d\'ombre sur les formes simples.',
            'Exploration de formes pures et de l\'harmonie des couleurs.',
            'Capture de la puissance brute de la nature et de l\'eau.',
            'Célébration de la beauté naturelle et de la biodiversité.',
            'Réflexion sur la vie urbaine et l\'isolement moderne.',
            'Exploration de l\'identité et de l\'introspection personnelle.',
            'Immersion dans la sérénité et le mystère de la nature.',
        ];

        // Si aucun utilisateur, créer au moins un
        if ($users->isEmpty()) {
            $user = User::create([
                'username' => 'artist',
                'email' => 'artist@test.com',
                'first_name' => 'Artist',
                'last_name' => 'Test',
                'password' => bcrypt('password'),
            ]);
            $users = collect([$user]);
        }

        // Créer 10 œuvres, changeé tous les contents en description, ajoute img_path et appel pour exectuer seeder
        foreach (range(1, 10) as $index) {
            Painting::create([
                'title' => $titles[$index - 1] ?? 'Œuvre ' . $index,
                'description' => $descriptions[$index - 1] ?? 'Une œuvre intéressante.',
                'image_path' => 'artworks/placeholder-' . $index . '.jpg', // Image fictive pour test
                'user_id' => $users->random()->id, // Assigner à un utilisateur aléatoire
                'category' => collect(['acrylique', 'gouache', 'aquarelle', 'huile'])->random(),
            ]);
        }
    }
}
