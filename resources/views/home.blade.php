<x-default-layout>
    <x-slot:title>
        {{ __('ui.home.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.home.description') }}
    </x-slot>

    <h1 class="text-2xl font-bold text-text">
        {{ config('app.name') }}
    </h1>

    <p class="mt-4 text-text">
        {{ __('ui.home.introduction', ['app_name' => config('app.name')]) }}
    </p>

    <h2 class="text-xl font-bold text-text mt-8">
        {{ __('ui.home.recent_posts') }}
    </h2>

    <div class="mt-8 space-y-6">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>

    <a href="{{ url('/posts') }}"
        class="mt-6 block w-full px-4 py-2 bg-accent text-text rounded-md hover:bg-action text-center">
        {{ __('ui.home.see_all_posts') }}
    </a>
</x-default-layout>
