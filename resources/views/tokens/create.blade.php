<x-default-layout>
    <x-slot:title>
        {{ __('ui.tokens.create.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.tokens.create.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">
                {{ __('ui.tokens.create.title') }}
            </h1>

            <p class="mt-4 dark:text-gray-300">
                {{ __('ui.tokens.create.description', ['app_name' => config('app.name')]) }}
            </p>
        </header>

        <form method="POST" action="{{ url('/tokens') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.tokens.form.fields.name.label') }}
                </label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                    placeholder="{{ __('ui.tokens.form.fields.name.placeholder') }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('name') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('name')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <fieldset>
                    <legend class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('ui.tokens.form.fields.scopes.label') }}
                    </legend>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="scope-posts:create" name="scopes[]" value="posts:create"
                            {{ in_array('posts:create', old('scopes', [])) ? 'checked' : '' }} class="mr-2">
                        <label for="scope-posts:create" class="text-sm text-gray-700 dark:text-gray-300">
                            {{ __('ui.tokens.form.fields.scopes.options.posts_create') }}
                        </label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="scope-posts:read" name="scopes[]" value="posts:read"
                            {{ in_array('posts:read', old('scopes', [])) ? 'checked' : '' }} class="mr-2">
                        <label for="scope-posts:read" class="text-sm text-gray-700 dark:text-gray-300">
                            {{ __('ui.tokens.form.fields.scopes.options.posts_read') }}
                        </label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="scope-posts:update" name="scopes[]" value="posts:update"
                            {{ in_array('posts:update', old('scopes', [])) ? 'checked' : '' }} class="mr-2">
                        <label for="scope-posts:update" class="text-sm text-gray-700 dark:text-gray-300">
                            {{ __('ui.tokens.form.fields.scopes.options.posts_update') }}
                        </label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="scope-posts:delete" name="scopes[]" value="posts:delete"
                            {{ in_array('posts:delete', old('scopes', [])) ? 'checked' : '' }} class="mr-2">
                        <label for="scope-posts:delete" class="text-sm text-gray-700 dark:text-gray-300">
                            {{ __('ui.tokens.form.fields.scopes.options.posts_delete') }}
                        </label>
                    </div>
                    @error('scopes')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>

            <div class="mb-6">
                <label for="expiration_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.tokens.form.fields.expiration_date.label') }}
                </label>
                <input id="expiration_date" type="date" name="expiration_date" value="{{ old('expiration_date') }}"
                    min="{{ now()->addDay()->toDateString() }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('expiration_date') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    {{ __('ui.tokens.form.fields.expiration_date.help') }}</p>
                @error('expiration_date')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/tokens') }}"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ __('ui.tokens.form.actions.cancel') }}
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 cursor-pointer">
                        {{ __('ui.tokens.form.actions.submit') }}
                    </button>
                </div>
            </footer>
        </form>
    </article>
</x-default-layout>
