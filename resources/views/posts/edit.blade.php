<x-default-layout>
    <x-slot:title>
        @if ($post->title)
            {{ __('ui.posts.edit.title', ['post_title' => $post->title]) }}
        @else
            {{ __('ui.posts.edit.title_without_post_title') }}
        @endif
    </x-slot>

    <x-slot:description>
        @if ($post->title)
            {{ __('ui.posts.edit.description', ['post_title' => $post->title]) }}
        @else
            {{ __('ui.posts.edit.description_without_post_title') }}
        @endif
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">
                @if ($post->title)
                    {{ __('ui.posts.edit.title', ['post_title' => $post->title]) }}
                @else
                    {{ __('ui.posts.edit.title_without_post_title') }}
                @endif
            </h1>

            <p class="mt-4 dark:text-gray-300">
                @if ($post->title)
                    {{ __('ui.posts.edit.description', ['post_title' => $post->title]) }}
                @else
                    {{ __('ui.posts.edit.description_without_post_title') }}
                @endif
            </p>
        </header>

        {{-- Formulaire à venir... --}}
    </article>
</x-default-layout>
