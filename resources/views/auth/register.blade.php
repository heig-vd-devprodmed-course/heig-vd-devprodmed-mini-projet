<x-default-layout>
    <x-slot:title>
        {{ __('ui.auth.register.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.auth.register.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6 max-w-md mx-auto">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">
                {{ __('ui.auth.register.title') }}
            </h1>

            <p class="mt-4 dark:text-gray-300">
                {{ __('ui.auth.register.description', ['app_name' => config('app.name')]) }}
            </p>
        </header>

        <form method="POST" action="{{ url('/auth/register') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.auth.register.form.fields.username.label') }}
                </label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus
                    placeholder="{{ __('ui.auth.register.form.fields.username.placeholder') }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('username') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('username')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.auth.register.form.fields.email.label') }}
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    placeholder="{{ __('ui.auth.register.form.fields.email.placeholder') }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('email') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.auth.register.form.fields.first_name.label') }}
                </label>
                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required
                    placeholder="{{ __('ui.auth.register.form.fields.first_name.placeholder') }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('first_name') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('first_name')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.auth.register.form.fields.last_name.label') }}
                </label>
                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required
                    placeholder="{{ __('ui.auth.register.form.fields.last_name.placeholder') }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('last_name') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('last_name')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.auth.register.form.fields.password.label') }}
                </label>
                <input id="password" type="password" name="password" required
                    placeholder="{{ __('ui.auth.register.form.fields.password.placeholder') }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('password') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.auth.register.form.fields.password_confirmation.label') }}
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    placeholder="{{ __('ui.auth.register.form.fields.password_confirmation.placeholder') }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500">
            </div>

            <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex flex-col gap-4">
                    <button type="submit"
                        class="w-full px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 cursor-pointer">
                        {{ __('ui.auth.register.form.actions.submit') }}
                    </button>

                    <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                        {{ __('ui.auth.register.already_have_account') }}
                        <a href="{{ url('/auth/login') }}" class="text-teal-600 dark:text-purple-400 hover:underline">
                            {{ __('ui.auth.register.login') }}
                        </a>
                    </p>
                </div>
            </footer>
        </form>
    </article>
</x-default-layout>
