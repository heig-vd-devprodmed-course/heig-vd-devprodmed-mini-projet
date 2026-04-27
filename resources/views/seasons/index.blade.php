<x-default-layout>
    <x-slot:title>
        {{ __('ui.friends.seasons.index.title') }}
    </x-slot:title>

    <x-slot:description>
        {{ __('ui.friends.seasons.index.description') }}
    </x-slot:description>

    <h1 class="text-2xl font-bold dark:text-white mb-4">
        {{ __('ui.friends.seasons.index.heading') }}
    </h1>

    <ul class="space-y-2">
        @foreach ($seasons as $season)
            <li>
                <a href="{{ route('episodes.index', $season) }}"
                   class="text-action dark:text-purple-400 hover:underline">
                    {{ __('ui.friends.seasons.index.season_label', ['number' => $season->number]) }}
                </a>
            </li>
        @endforeach
    </ul>
</x-default-layout>
