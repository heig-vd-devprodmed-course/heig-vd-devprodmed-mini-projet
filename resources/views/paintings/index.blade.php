<x-default-layout>
    <x-slot:title>
        {{ __('ui.paintings.index.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.paintings.index.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <h1 class="text-2xl font-bold dark:text-white">
        {{ __('ui.paintings.index.title') }}
    </h1>

    <p class="mt-4 dark:text-gray-300">
        {{ __('ui.paintings.index.description', ['app_name' => config('app.name')]) }}
    </p>

    @can('create', App\Models\Painting::class)
        <a href="{{ url('/paintings/create') }}"
            class="mt-6 block w-full px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 text-center">
            {{ __('ui.paintings.create.title') }}
        </a>
    @endcan

    {{-- Filtre par catégorie --}}
    <form method="GET" action="{{ url('/paintings') }}" class="mt-4">
        <select name="category" onchange="this.form.submit()"
            class="px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600">
            <option value="">Toutes les catégories</option>
            <option value="acrylique" {{ request('category') == 'acrylique' ? 'selected' : '' }}>Acrylique</option>
            <option value="gouache" {{ request('category') == 'gouache' ? 'selected' : '' }}>Gouache</option>
            <option value="aquarelle" {{ request('category') == 'aquarelle' ? 'selected' : '' }}>Aquarelle</option>
            <option value="huile" {{ request('category') == 'huile' ? 'selected' : '' }}>Peinture à l'huile</option>
        </select>
    </form>

    <div class="mt-8 space-y-6">
        @foreach ($paintings as $painting)
            <x-painting-card :painting="$painting" />
        @endforeach
    </div>
</x-default-layout>
