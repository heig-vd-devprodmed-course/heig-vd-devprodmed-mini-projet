<x-default-layout>
    <x-slot:title>
        Ajouter un genre
    </x-slot>

    <x-slot:description>
        Créer un nouveau genre de jeu vidéo
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">
                Ajouter un genre
            </h1>
        </header>

        <form method="POST" action="{{ url('/categories') }}">
            @csrf {{-- Protection contre les attaques CSRF, obligatoire sur tout formulaire POST --}}

            <div class="mb-4">
                <label for="name"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nom du genre
                </label>
                {{-- old('name') = remet la valeur si le formulaire a échoué la validation --}}
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                    placeholder="Ex: RPG, FPS, Indie..."
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('name') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 @enderror">

                {{-- Affiche le message d'erreur de validation si le nom est invalide --}}
                @error('name')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/categories') }}"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                        Annuler
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 cursor-pointer">
                        Créer le genre
                    </button>
                </div>
            </footer>
        </form>
    </article>
</x-default-layout>
