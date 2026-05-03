<x-default-layout>
    <x-slot:title>
        Catégories de jeux
    </x-slot>

    <x-slot:description>
        Parcourez les reviews par genre de jeu
    </x-slot>

    <h1 class="text-2xl font-bold dark:text-white">
        Genres de jeux
    </h1>

    <p class="mt-4 dark:text-gray-300">
        Parcourez les reviews par genre de jeu vidéo.
    </p>

    {{-- Bouton visible uniquement si l'utilisateur est connecté --}}
    @auth
        <a href="{{ url('/categories/create') }}"
            class="mt-6 block w-full px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 text-center">
            Ajouter un genre
        </a>
    @endauth

    <div class="mt-8 grid grid-cols-2 gap-4">
        {{-- On boucle sur toutes les catégories --}}
        @forelse ($categories as $category)
            <a href="{{ url('/categories/' . $category->slug) }}"
                class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <h2 class="text-xl font-bold dark:text-white">
                    {{ $category->name }}
                </h2>
                {{-- posts_count vient du withCount('posts') dans le contrôleur --}}
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                    {{ $category->posts_count }} review(s)
                </p>
            </a>
        @empty
            {{-- Affiché si aucune catégorie n'existe encore --}}
            <p class="text-gray-500 dark:text-gray-400 col-span-2">
                Aucun genre pour l'instant.
            </p>
        @endforelse
    </div>
</x-default-layout>
