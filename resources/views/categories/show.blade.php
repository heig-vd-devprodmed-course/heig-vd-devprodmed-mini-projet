<x-default-layout>
    <x-slot:title>
        {{ $category->name }}
    </x-slot>

    <x-slot:description>
        Toutes les reviews de jeux {{ $category->name }}
    </x-slot>

    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold dark:text-white">
            {{ $category->name }}
            {{-- posts_count vient du withCount('posts') dans le contrôleur --}}
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                ({{ $category->posts_count }} review(s))
            </span>
        </h1>

        {{-- Lien pour revenir à la liste des catégories --}}
        <a href="{{ url('/categories') }}"
            class="text-sm text-teal-600 dark:text-purple-400 hover:underline">
            ← Tous les genres
        </a>
    </div>

    <div class="mt-8 space-y-6">
        {{-- On réutilise le composant post-card déjà existant dans le projet --}}
        @forelse ($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <p class="text-gray-500 dark:text-gray-400">
                Aucune review dans ce genre pour l'instant.
            </p>
        @endforelse
    </div>
</x-default-layout>
