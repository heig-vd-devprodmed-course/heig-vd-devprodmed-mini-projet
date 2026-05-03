<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Pour générer le slug automatiquement

class CategoryController extends Controller
{
    /**
     * Affiche la liste de toutes les catégories.
     * Accessible à tout le monde : /categories
     */
    public function index()
    {
        // On récupère toutes les catégories
        // withCount('posts') ajoute automatiquement un attribut
        // $category->posts_count pour afficher "12 reviews"
        $categories = Category::withCount('posts')->get();

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Affiche tous les posts d'une catégorie spécifique.
     * Accessible à tout le monde : /categories/rpg
     */
    public function show(string $slug)
    {
        // On cherche la catégorie par son slug (ex: "rpg")
        // Si elle n'existe pas, Laravel renvoie automatiquement une erreur 404
        $category = Category::where('slug', $slug)
                            ->withCount('posts')
                            ->firstOrFail();

        // On récupère les posts de cette catégorie, du plus récent au plus ancien
        $posts = $category->posts()
                          ->with('user')   // On charge l'auteur de chaque post
                          ->with('likes')  // On charge les likes de chaque post
                          ->orderBy('created_at', 'desc')
                          ->get();

        return view('categories.show', [
            'category' => $category,
            'posts' => $posts
        ]);
    }

    /**
     * Affiche le formulaire de création d'une catégorie.
     * Réservé aux utilisateurs connectés : /categories/create
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Enregistre une nouvelle catégorie en base de données.
     * Appelé quand on soumet le formulaire de création.
     */
    public function store(Request $request)
    {
        // On valide les données du formulaire avant de les sauvegarder
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            // unique:categories,name = le nom doit être unique dans la table categories
        ]);

        // On crée la catégorie avec le nom et le slug généré automatiquement
        // Str::slug('Role Playing Game') → 'role-playing-game'
        Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return redirect('/categories');
    }
}
