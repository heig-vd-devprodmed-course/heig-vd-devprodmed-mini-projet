<x-default-layout>
    <x-slot:title>
        {{ __('ui.auth.login.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.auth.login.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <article class="bg-background rounded-lg shadow-md p-6 max-w-md mx-auto border border-border">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-text mb-2">
                {{ __('ui.auth.login.title') }}
            </h1>

            <p class="mt-4 text-text">
                {{ __('ui.auth.login.description', ['app_name' => config('app.name')]) }}
            </p>
        </header>

        <form method="POST" action="{{ url('/auth/login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.auth.login.form.fields.email.label') }}
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="{{ __('ui.auth.login.form.fields.email.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:border-transparent @error('email') border-error focus:ring-error @else focus:ring-accent @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.auth.login.form.fields.password.label') }}
                </label>
                <input id="password" type="password" name="password" required
                    placeholder="{{ __('ui.auth.login.form.fields.password.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:border-transparent @error('password') border-error focus:ring-error @else focus:ring-accent @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}

                        class="rounded border-border text-accent focus:ring-accent">
                    <span class="ml-2 text-sm text-text">
                        {{ __('ui.auth.login.form.fields.remember.label') }}
                    </span>
                </label>
            </div>

            <footer class="pt-4 border-t border-border">
                <div class="flex flex-col gap-4">
                    <button type="submit"
                        class="w-full px-4 py-2 bg-accent text-text rounded-md hover:bg-action cursor-pointer">
                        {{ __('ui.auth.login.form.actions.submit') }}
                    </button>

                    <p class="text-center text-sm text-text">
                        {{ __('ui.auth.login.no_account') }}
                        <a href="{{ url('/auth/register') }}"
                            class="text-accent hover:underline">
                            {{ __('ui.auth.login.register') }}
                        </a>
                    </p>
                </div>
            </footer>
        </form>
    </article>
</x-default-layout>
