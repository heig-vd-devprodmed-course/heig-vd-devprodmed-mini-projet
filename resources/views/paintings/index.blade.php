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

    <div class="mt-8 space-y-6">
        @foreach ($paintings as $painting)
            <x-painting-card :painting="$painting" />
        @endforeach
    </div>
</x-default-layout>
