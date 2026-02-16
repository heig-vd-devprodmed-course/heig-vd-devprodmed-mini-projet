<x-default-layout>
    <x-slot:title>
        {{ __('ui.profile.title', ['username' => $user->username]) }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.profile.description', ['username' => $user->username]) }}
    </x-slot>

    <h1 class="text-2xl font-bold dark:text-white">
        {{ __('ui.profile.title', ['username' => $user->username]) }}
    </h1>

    <p class="mt-4 dark:text-gray-300">
        {{ trans_choice('ui.profile.number_of_posts', count($posts)) }}
    </p>

    <div class="mt-8 space-y-6">
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
    </div>
</x-default-layout>
