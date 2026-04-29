<x-default-layout>
    <x-slot:title>
        {{ __('ui.profile.title', ['username' => $user->username]) }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.profile.description', ['username' => $user->username]) }}
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6 text-center mb-8">
        <div class="flex justify-center mb-6">
            <div
                class="w-32 h-32 rounded-full overflow-hidden bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->username }}"
                        class="w-full h-full object-cover">
                @else
                    <img src="/icons/profile.svg" alt="{{ $user->username }}" class="h-32 w-32 text-gray-400">
                @endif
            </div>
        </div>

        <h1 class="text-2xl font-bold dark:text-white">
            {{ $user->first_name }} {{ $user->last_name }}
        </h1>

        <p class="text-lg text-gray-600 dark:text-gray-400 mt-1">
            {{ '@' . $user->username }}
        </p>
        @if($user->is_admin)
            <span class="text-xs bg-red-600 text-white px-2 py-0.5 rounded-full">Admin</span>
        @endif
        <p class="mt-4 dark:text-gray-300">
            {{ __('ui.profile.member_since', ['date' => $user->created_at->isoFormat('LL')]) }}
        </p>
    </article>

    <div class="mb-6">
        <h2 class="text-xl font-bold dark:text-white">
            {{ __('ui.profile.paintings_heading', ['first_name' => $user->first_name, 'last_name' => $user->last_name]) }}
        </h2>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            {{ trans_choice('ui.profile.number_of_paintings', count($paintings)) }}
        </p>
    </div>

    <div class="space-y-6">
        @forelse ($paintings as $painting)
            <x-painting-card :painting="$painting" />
        @empty
            <p class="text-center text-gray-500 dark:text-gray-400">
                {{ __('ui.paintings.no_paintings') }}
            </p>
        @endforelse
    </div>
</x-default-layout>
