<x-default-layout>
    <x-slot:title>{{ __('ui.friends.seasons.index.title') }}</x-slot:title>
    <x-slot:description>{{ __('ui.friends.seasons.index.description') }}</x-slot:description>

    <h1 class="text-2xl font-bold text-text mb-4">
        {{ __('ui.friends.seasons.index.heading') }}
    </h1>

    <ul>
        @foreach ($seasons as $season)
            <li>
                <a href="{{ route('episodes.index', $season) }}" class="text-accent hover:underline">
                    {{ __('ui.friends.seasons.index.season_label', ['number' => $season->number]) }}
                </a>
            </li>
        @endforeach
    </ul>
</x-default-layout>
