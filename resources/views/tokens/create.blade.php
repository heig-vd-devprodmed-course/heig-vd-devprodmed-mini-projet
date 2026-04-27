<x-default-layout>
    <x-slot:title>
        {{ __('ui.tokens.create.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.tokens.create.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <article class="bg-background rounded-lg shadow-md p-6 border border-border">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-text mb-2">
                {{ __('ui.tokens.create.title') }}
            </h1>

            <p class="mt-4 text-text">
                {{ __('ui.tokens.create.description', ['app_name' => config('app.name')]) }}
            </p>
        </header>

        <form method="POST" action="{{ url('/tokens') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.tokens.form.fields.name.label') }}
                </label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                    placeholder="{{ __('ui.tokens.form.fields.name.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:ring-accent focus:border-transparent @error('name') border-error focus:ring-error @enderror">
                @error('name')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <fieldset>
                    <legend class="block text-sm font-medium text-text mb-2">
                        {{ __('ui.tokens.form.fields.scopes.label') }}
                    </legend>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="scope-posts:create" name="scopes[]" value="posts:create"
                            {{ in_array('posts:create', old('scopes', [])) ? 'checked' : '' }} class="mr-2 accent-accent">
                        <label for="scope-posts:create" class="text-sm text-text">
                            {{ __('ui.tokens.form.fields.scopes.options.posts_create') }}
                        </label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="scope-posts:read" name="scopes[]" value="posts:read"
                            {{ in_array('posts:read', old('scopes', [])) ? 'checked' : '' }} class="mr-2 accent-accent">

                        <label for="scope-posts:read" class="text-sm text-text">
                            {{ __('ui.tokens.form.fields.scopes.options.posts_read') }}
                        </label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="scope-posts:update" name="scopes[]" value="posts:update"
                            {{ in_array('posts:update', old('scopes', [])) ? 'checked' : '' }} class="mr-2 accent-accent">
                        <label for="scope-posts:update" class="text-sm text-text">
                            {{ __('ui.tokens.form.fields.scopes.options.posts_update') }}
                        </label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="scope-posts:delete" name="scopes[]" value="posts:delete"
                            {{ in_array('posts:delete', old('scopes', [])) ? 'checked' : '' }} class="mr-2 accent-accent">
                        <label for="scope-posts:delete" class="text-sm text-text">
                            {{ __('ui.tokens.form.fields.scopes.options.posts_delete') }}
                        </label>
                    </div>
                    @error('scopes')
                        <p class="mt-1 text-sm text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>

            <div class="mb-6">
                <label for="expiration_date" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.tokens.form.fields.expiration_date.label') }}
                </label>
                <input id="expiration_date" type="date" name="expiration_date" value="{{ old('expiration_date') }}"
                    min="{{ now()->addDay()->toDateString() }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:ring-accent focus:border-transparent @error('expiration_date') border-error focus:ring-error @enderror">
                <p class="mt-1 text-xs text-border">
                    {{ __('ui.tokens.form.fields.expiration_date.help') }}</p>
                @error('expiration_date')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <footer class="pt-4 border-t border-border">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/tokens') }}"
                        class="px-4 py-2 bg-border text-text rounded-md hover:bg-accent">
                        {{ __('ui.tokens.form.actions.cancel') }}
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-accent text-text rounded-md hover:bg-action cursor-pointer">
                        {{ __('ui.tokens.form.actions.submit') }}
                    </button>
                </div>
            </footer>
        </form>
    </article>
</x-default-layout>
