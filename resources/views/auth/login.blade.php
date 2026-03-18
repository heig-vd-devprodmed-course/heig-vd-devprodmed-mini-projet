<x-default-layout>
    <x-slot:title>
        {{ __('ui.auth.login.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.auth.login.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6 max-w-md mx-auto">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">
                {{ __('ui.auth.login.title') }}
            </h1>

            <p class="mt-4 dark:text-gray-300">
                {{ __('ui.auth.login.description', ['app_name' => config('app.name')]) }}
            </p>
        </header>

        @if (session('success'))
            <div
                class="mb-4 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/auth/login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.auth.login.form.fields.email.label') }}
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="{{ __('ui.auth.login.form.fields.email.placeholder') }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('email') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.auth.login.form.fields.password.label') }}
                </label>
                <input id="password" type="password" name="password" required
                    placeholder="{{ __('ui.auth.login.form.fields.password.placeholder') }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('password') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                        class="rounded border-gray-300 dark:border-gray-600 text-teal-600 dark:text-purple-500 focus:ring-teal-500 dark:focus:ring-purple-500">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                        {{ __('ui.auth.login.form.fields.remember.label') }}
                    </span>
                </label>
            </div>

            <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex flex-col gap-4">
                    <button type="submit"
                        class="w-full px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 cursor-pointer">
                        {{ __('ui.auth.login.form.actions.submit') }}
                    </button>

                    <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                        {{ __('ui.auth.login.no_account') }}
                        <a href="{{ url('/auth/register') }}"
                            class="text-teal-600 dark:text-purple-400 hover:underline">
                            {{ __('ui.auth.login.register') }}
                        </a>
                    </p>
                </div>
            </footer>
        </form>
    </article>
</x-default-layout>
