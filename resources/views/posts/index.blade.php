<x-default-layout>
    <x-slot:title>
        {{ __('ui.posts.index.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.posts.index.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <h1 class="text-2xl font-bold text-text">
        {{ __('ui.posts.index.title') }}
    </h1>

    <p class="mt-4 text-text">
        {{ __('ui.posts.index.description', ['app_name' => config('app.name')]) }}
    </p>

    @can('create', App\Models\Post::class)
        <a href="{{ url('/posts/create') }}"
            class="mt-6 block w-full px-4 py-2 bg-accent text-text rounded-md hover:bg-action text-center">
            {{ __('ui.posts.create.title') }}
        </a>
    @endcan

    <div class="mt-8 space-y-6">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
</x-default-layout>
