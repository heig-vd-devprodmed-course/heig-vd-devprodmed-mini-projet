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

        <form method="POST" action="{{ url('/posts/' . $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.posts.form.fields.title.label') }}
                </label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                    placeholder="{{ __('ui.posts.form.fields.title.placeholder') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent @error('title') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('title')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            @if ($post->image_path)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Image actuelle
                    </label>
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="h-48 w-full object-cover rounded-md mb-4">
                </div>
            @endif

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Changer l'image (optionnel)
                </label>
                <input id="image" type="file" name="image" accept="image/*"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('image') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('image')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.posts.form.fields.content.label') }}
                </label>
                <textarea id="description" name="description" rows="5"
                    placeholder="{{ __('ui.posts.form.fields.content.placeholder') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent @error('description') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div class="flex gap-2">
                        <a href="{{ url('/posts/' . $post->id) }}"
                            class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                            {{ __('ui.posts.form.actions.cancel') }}
                        </a>
                        <button type="submit" form="delete-post-form"
                            onclick="return confirm('{{ __('ui.posts.form.actions.delete_confirm') }}')"
                            class="px-4 py-2 bg-red-600 dark:bg-red-900 text-white rounded-md hover:bg-red-700 dark:hover:bg-red-800 cursor-pointer">
                            {{ __('ui.posts.form.actions.delete') }}
                        </button>
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 cursor-pointer">
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
