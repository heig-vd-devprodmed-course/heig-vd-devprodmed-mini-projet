<x-default-layout>
    <x-slot:title>
        {{ __('ui.friends.episodes.index.title', ['season' => $season->number]) }}
    </x-slot:title>

    <x-slot:description>
        {{ __('ui.friends.episodes.index.description', ['season' => $season->number]) }}
    </x-slot:description>

    <h1 class="text-2xl font-bold dark:text-white mb-4">
        {{ __('ui.friends.episodes.index.heading', ['season' => $season->number]) }}
    </h1>

    <ul class="space-y-2">
        @foreach ($episodes as $episode)
            <li>
                <a href="{{ route('episodes.show', $episode) }}"
                   class="hover:underline">
                    {{ __('ui.friends.episodes.index.episode_label', [
                        'number' => $episode->number,
                        'title' => $episode->title,
                    ]) }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="mt-6">
        <a href="{{ route('seasons.index') }}" class="hover:underline">
            {{ __('ui.friends.seasons.index.back') }}
        </a>
    </div>
</x-default-layout>
