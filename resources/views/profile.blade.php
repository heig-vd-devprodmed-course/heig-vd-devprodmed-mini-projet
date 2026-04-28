<x-default-layout>
    <x-slot:title>
        {{ __('ui.profile.title', ['username' => $user->username]) }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.profile.description', ['username' => $user->username]) }}
    </x-slot>

    <article class="bg-background rounded-lg shadow-md p-6 text-center mb-8 border border-border">
        <div class="flex justify-center mb-6">
            <div
                class="w-32 h-32 rounded-full overflow-hidden bg-border flex items-center justify-center">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->username }}"
                        class="w-full h-full object-cover">
                @else
                    <img src="/icons/profile.svg" alt="{{ $user->username }}" class="h-32 w-32 text-border">
                @endif
            </div>
        </div>

        <h1 class="text-2xl font-bold text-text">
            {{ $user->first_name }} {{ $user->last_name }}
        </h1>

        <p class="text-lg text-border mt-1">
            {{ '@' . $user->username }}
        </p>

        <p class="mt-4 text-text">
            {{ __('ui.profile.member_since', ['date' => $user->created_at->isoFormat('LL')]) }}
        </p>
    </article>

    <div class="mb-6">
        <h2 class="text-xl font-bold text-text">
            {{ __('ui.profile.posts_heading', ['first_name' => $user->first_name, 'last_name' => $user->last_name]) }}
        </h2>
        <p class="mt-2 text-sm text-border">
            {{ trans_choice('ui.profile.number_of_posts', count($posts)) }}
        </p>
    </div>

    <div class="space-y-6">
        @forelse ($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <p class="text-center text-border">
                {{ __('ui.posts.no_posts') }}
            </p>
        @endforelse
    </div>
</x-default-layout>
