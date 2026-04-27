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
                <h2 class="text-xl font-semibold text-text">
                    {{ __('ui.friends.vote.heading') }}
                </h2>
                <p class="text-[14px] leading-[1.6] text-text-secondary">
                    {{ __('ui.friends.vote.placeholder') }}
                </p>
            </footer>

        </div>

    </article>
</x-default-layout>
