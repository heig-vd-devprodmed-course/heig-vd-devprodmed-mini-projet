<x-default-layout>
    <x-slot:title>{{ __('ui.friends.vote.title', ['title' => $episode->title]) }}</x-slot:title>
    <x-slot:description>{{ __('ui.friends.vote.description', ['title' => $episode->title]) }}</x-slot:description>

    <article class="rounded-lg overflow-hidden border border-border bg-background shadow-sm">

        @if($episode->image_url)
            <div class="w-full overflow-hidden" style="aspect-ratio: 16/7;">
                <img src="{{ $episode->image_url }}" alt="{{ $episode->title }}" class="w-full h-full object-cover block">
            </div>
        @endif

        <div class="p-8">
            <header class="mb-6">
                <div class="flex items-center gap-2.5 mb-4">
                    <span class="text-[11px] font-medium uppercase tracking-[0.06em] border border-border px-2 py-0.5 rounded bg-surface text-muted">
                        Friends
                    </span>
                    <span class="w-1 h-1 rounded-full bg-border inline-block"></span>
                    <p class="text-[12px] text-muted tracking-[0.03em]">
                        {{ __('ui.friends.vote.meta', [
                            'season' => $episode->season->number,
                            'episode' => $episode->number,
                        ]) }}
                    </p>
                </div>

                <h1 class="text-3xl font-bold text-text mb-4">
                    {{ $episode->title }}
                </h1>

                <p class="text-[15px] leading-[1.75] text-text-secondary">
                    {{ $episode->synopsis }}
                </p>
            </header>

            <footer class="pt-6 border-t border-border flex flex-col gap-3">
                <h2 class="text-xl font-bold dark:text-white mt-6 mb-2">
                    {{ __('ui.friends.vote.average_heading') }}
                </h2>

                @if ($averageRating)
                    <p class="dark:text-gray-300">
                        {{ __('ui.friends.vote.average', [
                            'average' => number_format($averageRating, 1)
                        ]) }}
                    </p>
                @else
                    <p class="dark:text-gray-400 italic">
                        {{ __('ui.friends.vote.no_ratings_yet') }}
                    </p>
                @endif
                <h2 class="text-xl font-bold dark:text-white mb-2">
                    {{ __('ui.friends.vote.heading') }}
                </h2>
                @auth
                    @if ($userRating)
                        <p class="mt-4 text-green-600 dark:text-green-400 font-medium">
                            {{ __('ui.friends.vote.your_rating', ['rating' => $userRating->rating]) }}
                        </p>
                    @else
                        <form method="POST" action="{{ route('ratings.store', $episode) }}" class="mt-4">
                            @csrf

                            <div class="mb-4">
                                <label for="rating" class="block text-sm font-medium dark:text-gray-300 mb-2">
                                    {{ __('ui.friends.vote.select_label') }}
                                </label>

                                <select
                                    name="rating"
                                    id="rating"
                                    class="w-full px-3 py-2 border rounded-md dark:bg-slate-700 dark:text-white
                           @error('rating') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror"
                                    required
                                >
                                    <option value="">—</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>

                                @error('rating')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <button
                                type="submit"
                                class="px-4 py-2 bg-action dark:bg-purple-900 text-white rounded-md
                       hover:bg-action dark:hover:bg-purple-800"
                            >
                                {{ __('ui.friends.vote.submit') }}
                            </button>
                        </form>
                    @endif
                @else
                    <p class="mt-4 dark:text-gray-300">
                        {{ __('ui.friends.vote.login_required') }}
                        <a href="{{ route('login') }}" class="text-action hover:underline">
                            {{ __('ui.friends.vote.login_link') }}
                        </a>
                    </p>
                @endauth
            </footer>
        </div>

    </article>
</x-default-layout>
