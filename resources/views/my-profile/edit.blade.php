<x-default-layout>
    <x-slot:title>
        {{ __('ui.my_profile.edit.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.my_profile.edit.description') }}
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-2xl font-bold dark:text-white">
                {{ __('ui.my_profile.edit.title') }}
            </h1>

            <p class="mt-4 dark:text-gray-300">
                {{ __('ui.my_profile.edit.description') }}
            </p>
        </header>

        <form method="POST" enctype="multipart/form-data" action="{{ url('/my-profile') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="profile-picture" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.my_profile.form.fields.profile_picture.label') }}
                </label>
                <input type="file" id="profile-picture" name="profile_picture"
                    accept="image/jpeg,image/png,image/bmp,image/gif,image/webp"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 dark:file:bg-purple-900 dark:file:text-purple-200 dark:hover:file:bg-purple-800">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('ui.my_profile.form.fields.profile_picture.help') }}
                </p>
                @error('profile_picture')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.my_profile.form.fields.username.label') }}
                </label>
                <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}"
                    placeholder="{{ __('ui.my_profile.form.fields.username.placeholder') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent @error('username') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('username')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.my_profile.form.fields.email.label') }}
                </label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                    placeholder="{{ __('ui.my_profile.form.fields.email.placeholder') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent @error('email') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="first-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.my_profile.form.fields.first_name.label') }}
                </label>
                <input type="text" id="first-name" name="first_name"
                    value="{{ old('first_name', $user->first_name) }}"
                    placeholder="{{ __('ui.my_profile.form.fields.first_name.placeholder') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent @error('first_name') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('first_name')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="last-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.my_profile.form.fields.last_name.label') }}
                </label>
                <input type="text" id="last-name" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                    placeholder="{{ __('ui.my_profile.form.fields.last_name.placeholder') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent @error('last_name') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('last_name')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div class="flex gap-2">
                        <a href="{{ url('/my-profile') }}"
                            class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                            {{ __('ui.my_profile.form.actions.cancel') }}
                        </a>
                        <button type="submit" form="delete-profile-form"
                            onclick="return confirm('{{ __('ui.my_profile.form.actions.delete_confirm') }}')"
                            class="px-4 py-2 bg-red-600 dark:bg-red-900 text-white rounded-md hover:bg-red-700 dark:hover:bg-red-800 cursor-pointer">
                            {{ __('ui.my_profile.form.actions.delete') }}
                        </button>
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 cursor-pointer">
                        {{ __('ui.my_profile.form.actions.submit') }}
                    </button>
                </div>
            </footer>
        </form>

        <form id="delete-profile-form" method="POST" action="{{ url('/my-profile') }}" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </article>
</x-default-layout>
