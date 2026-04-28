<x-default-layout>
    <x-slot:title>
        {{ __('ui.my_profile.edit.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.my_profile.edit.description') }}
    </x-slot>

    <article class="bg-background rounded-lg shadow-md p-6 border border-border">
        <header class="mb-6">
            <h1 class="text-2xl font-bold text-text">
                {{ __('ui.my_profile.edit.title') }}
            </h1>

            <p class="mt-4 text-text">
                {{ __('ui.my_profile.edit.description') }}
            </p>
        </header>

        <form method="POST" enctype="multipart/form-data" action="{{ url('/my-profile') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="profile-picture" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.my_profile.form.fields.profile_picture.label') }}
                </label>
                <input type="file" id="profile-picture" name="profile_picture"
                    accept="image/jpeg,image/png,image/bmp,image/gif,image/webp"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:ring-accent focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-accent file:text-text hover:file:bg-action">
                <p class="mt-1 text-sm text-border">
                    {{ __('ui.my_profile.form.fields.profile_picture.help') }}
                </p>
                @error('profile_picture')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.my_profile.form.fields.username.label') }}
                </label>
                <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}"
                    placeholder="{{ __('ui.my_profile.form.fields.username.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:ring-accent focus:border-transparent @error('username') border-error focus:ring-error @enderror">
                @error('username')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.my_profile.form.fields.email.label') }}
                </label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                    placeholder="{{ __('ui.my_profile.form.fields.email.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:ring-accent focus:border-transparent @error('email') border-error focus:ring-error @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="first-name" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.my_profile.form.fields.first_name.label') }}
                </label>
                <input type="text" id="first-name" name="first_name"
                    value="{{ old('first_name', $user->first_name) }}"
                    placeholder="{{ __('ui.my_profile.form.fields.first_name.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:ring-accent focus:border-transparent @error('first_name') border-error focus:ring-error @enderror">
                @error('first_name')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="last-name" class="block text-sm font-medium text-text mb-2">
                    {{ __('ui.my_profile.form.fields.last_name.label') }}
                </label>
                <input type="text" id="last-name" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                    placeholder="{{ __('ui.my_profile.form.fields.last_name.placeholder') }}"
                    class="w-full px-3 py-2 border border-border rounded-md bg-background text-text focus:ring-2 focus:ring-accent focus:border-transparent @error('last_name') border-error focus:ring-error @enderror">
                @error('last_name')
                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                @enderror
            </div>

            <footer class="pt-4 border-t border-border">
                <div class="flex items-center justify-between">
                    <div class="flex gap-2">
                        <a href="{{ url('/my-profile') }}"
                            class="px-4 py-2 bg-border text-text rounded-md hover:bg-accent">
                            {{ __('ui.my_profile.form.actions.cancel') }}
                        </a>
                        <button type="submit" form="delete-profile-form"
                            onclick="return confirm('{{ __('ui.my_profile.form.actions.delete_confirm') }}')"
                            class="px-4 py-2 bg-error text-text rounded-md hover:bg-red-700 cursor-pointer">
                            {{ __('ui.my_profile.form.actions.delete') }}
                        </button>
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-accent text-text rounded-md hover:bg-action cursor-pointer">
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
