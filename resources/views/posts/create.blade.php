<x-default-layout>
    <x-slot:title>
        {{ __('ui.posts.create.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.posts.create.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <article class="bg-background rounded-lg shadow-md p-6 border border-border">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-text mb-2">
                {{ __('ui.posts.create.title') }}
            </h1>

            <p class="mt-4 text-text">
                {{ __('ui.posts.create.description', ['app_name' => config('app.name')]) }}
            </p>
        </header>

        <form method="POST" action="{{ url('/posts') }}">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.posts.form.fields.title.label') }}
                </label>
                <input id="title" type="text" name="title" value="{{ old('title') }}"
                    placeholder="{{ __('ui.posts.form.fields.title.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:border-transparent @error('title') border-error focus:ring-error @else focus:ring-accent @enderror">
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
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:border-transparent @error('content') border-error focus:ring-error @else focus:ring-accent @enderror">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <footer class="pt-4 border-t border-border">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/posts') }}"
                        class="px-4 py-2 bg-border text-text rounded-md hover:bg-accent">
                        {{ __('ui.posts.form.actions.cancel') }}
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-accent text-text rounded-md hover:bg-action cursor-pointer">
                        {{ __('ui.posts.form.actions.submit') }}
                    </button>
                </div>
            </footer>
        </form>
    </article>
</x-default-layout>
