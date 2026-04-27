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

    <article class="bg-background rounded-lg shadow-md p-6 border border-border">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-text mb-2">
                @if ($post->title)
                    {{ __('ui.posts.edit.title', ['post_title' => $post->title]) }}
                @else
                    {{ __('ui.posts.edit.title_without_post_title') }}
                @endif
            </h1>

            <p class="mt-4 text-text">
                @if ($post->title)
                    {{ __('ui.posts.edit.description', ['post_title' => $post->title]) }}
                @else
                    {{ __('ui.posts.edit.description_without_post_title') }}
                @endif
            </p>
        </header>

        <form method="POST" action="{{ url('/posts/' . $post->id) }}">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.posts.form.fields.title.label') }}
                </label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                    placeholder="{{ __('ui.posts.form.fields.title.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:ring-accent focus:border-transparent @error('title') border-error focus:ring-error @enderror">
                @error('title')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.posts.form.fields.content.label') }}
                </label>
                <textarea id="content" name="content" rows="5"
                    placeholder="{{ __('ui.posts.form.fields.content.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:ring-accent focus:border-transparent @error('content') border-error focus:ring-error @enderror">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <footer class="pt-4 border-t border-border">
                <div class="flex items-center justify-between">
                    <div class="flex gap-2">
                        <a href="{{ url('/posts/' . $post->id) }}"
                            class="px-4 py-2 bg-border text-text rounded-md hover:bg-accent">
                            {{ __('ui.posts.form.actions.cancel') }}
                        </a>
                        <button type="submit" form="delete-post-form"
                            onclick="return confirm('{{ __('ui.posts.form.actions.delete_confirm') }}')"
                            class="px-4 py-2 bg-error text-text rounded-md hover:bg-red-700 cursor-pointer">
                            {{ __('ui.posts.form.actions.delete') }}
                        </button>
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-accent text-text rounded-md hover:bg-action cursor-pointer">
                        {{ __('ui.posts.form.actions.submit') }}
                    </button>
                </div>
            </footer>
        </form>

        <form id="delete-post-form" method="POST" action="{{ url('/posts/' . $post->id) }}" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </article>
</x-default-layout>
