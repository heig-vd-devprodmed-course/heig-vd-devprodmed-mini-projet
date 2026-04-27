<x-default-layout>
    <x-slot:title>
        {{ __('ui.auth.register.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.auth.register.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <article class="bg-background rounded-lg shadow-md p-6 max-w-md mx-auto border border-border">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-text mb-2">
                {{ __('ui.auth.register.title') }}
            </h1>

            <p class="mt-4 text-text">
                {{ __('ui.auth.register.description', ['app_name' => config('app.name')]) }}
            </p>
        </header>

        <form method="POST" action="{{ url('/auth/register') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.auth.register.form.fields.username.label') }}
                </label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus
                    placeholder="{{ __('ui.auth.register.form.fields.username.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:border-transparent @error('username') border-error focus:ring-error @else focus:ring-accent @enderror">
                @error('username')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.auth.register.form.fields.email.label') }}
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    placeholder="{{ __('ui.auth.register.form.fields.email.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:border-transparent @error('email') border-error focus:ring-error @else focus:ring-accent @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.auth.register.form.fields.first_name.label') }}
                </label>
                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required
                    placeholder="{{ __('ui.auth.register.form.fields.first_name.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:border-transparent @error('first_name') border-error focus:ring-error @else focus:ring-accent @enderror">
                @error('first_name')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.auth.register.form.fields.last_name.label') }}
                </label>
                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required
                    placeholder="{{ __('ui.auth.register.form.fields.last_name.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:border-transparent @error('last_name') border-error focus:ring-error @else focus:ring-accent @enderror">
                @error('last_name')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.auth.register.form.fields.password.label') }}
                </label>
                <input id="password" type="password" name="password" required
                    placeholder="{{ __('ui.auth.register.form.fields.password.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:border-transparent @error('password') border-error focus:ring-error @else focus:ring-accent @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation"
                    class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.auth.register.form.fields.password_confirmation.label') }}
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    placeholder="{{ __('ui.auth.register.form.fields.password_confirmation.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:border-transparent focus:ring-accent">
            </div>

            <footer class="pt-4 border-t border-border">
                <div class="flex flex-col gap-4">
                    <button type="submit"
                        class="w-full px-4 py-2 bg-accent text-text rounded-md hover:bg-action cursor-pointer">
                        {{ __('ui.auth.register.form.actions.submit') }}
                    </button>


                    <p class="text-center text-sm text-text">
                        {{ __('ui.auth.register.already_have_account') }}
                        <a href="{{ url('/auth/login') }}" class="text-accent hover:underline">
                            {{ __('ui.auth.register.login') }}
                        </a>
                    </p>
                </div>
            </footer>
        </form>
    </article>
</x-default-layout>
