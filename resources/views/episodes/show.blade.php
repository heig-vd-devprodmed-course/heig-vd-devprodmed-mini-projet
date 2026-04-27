<x-default-layout>
    <x-slot:title>
        {{ __('ui.friends.vote.title', ['title' => $episode->title]) }}
    </x-slot:title>

    <x-slot:description>
        {{ __('ui.friends.vote.description', ['title' => $episode->title]) }}
    </x-slot:description>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">
                {{ $episode->title }}
            </h1>

            <p class="text-gray-600 dark:text-gray-300">
                {{ __('ui.friends.vote.meta', [
                    'season' => $episode->season->number,
                    'episode' => $episode->number,
                ]) }}
            </p>
        </header>

        @if ($episode->image_url)
            <img src="{{ $episode->image_url }}"
                 alt="{{ $episode->title }}"
                 class="mb-6 rounded-md max-w-xs">
        @endif

        <p class="dark:text-gray-300 mb-6">
            {{ $episode->synopsis }}
        </p>

        <hr class="my-6">

        <h2 class="text-xl font-bold dark:text-white mb-2">
            {{ __('ui.friends.vote.heading') }}
        </h2>

        <p class="dark:text-gray-300">
            {{ __('ui.friends.vote.placeholder') }}
        </p>

        <div class="mt-6">
            <a href="{{ route('episodes.index', $episode->season) }}"
               class="block w-full px-4 py-2 bg-action dark:bg-purple-900 text-white rounded-md hover:bg-action dark:hover:bg-purple-800 text-center">
                {{ __('ui.friends.vote.back') }}
            </a>
        </div>
    </article>
</x-default-layout>
