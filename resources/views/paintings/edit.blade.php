<x-default-layout>
    <x-slot:title>
        @if ($painting->title)
            {{ __('ui.paintings.edit.title', ['painting_title' => $painting->title]) }}
        @else
            {{ __('ui.paintings.edit.title_without_painting_title') }}
        @endif
    </x-slot>

    <x-slot:description>
        @if ($painting->title)
            {{ __('ui.paintings.edit.description', ['painting_title' => $painting->title]) }}
        @else
            {{ __('ui.paintings.edit.description_without_painting_title') }}
        @endif
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">
                @if ($painting->title)
                    {{ __('ui.paintings.edit.title', ['painting_title' => $painting->title]) }}
                @else
                    {{ __('ui.paintings.edit.title_without_painting_title') }}
                @endif
            </h1>

            <p class="mt-4 dark:text-gray-300">
                @if ($painting->title)
                    {{ __('ui.paintings.edit.description', ['painting_title' => $painting->title]) }}
                @else
                    {{ __('ui.paintings.edit.description_without_painting_title') }}
                @endif
            </p>
        </header>

        <form method="POST" action="{{ url('/paintings/' . $painting->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.paintings.form.fields.title.label') }}
                </label>
                <input type="text" id="title" name="title" value="{{ old('title', $painting->title) }}"
                    placeholder="{{ __('ui.paintings.form.fields.title.placeholder') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent @error('title') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('title')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            @if ($painting->image_path)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Image actuelle
                    </label>
                    <img src="{{ asset('storage/' . $painting->image_path) }}" alt="{{ $painting->title }}" class="h-48 w-full object-cover rounded-md mb-4">
                </div>
            @endif

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.paintings.form.fields.image.label') }}
                </label>
                <input id="image" type="file" name="image" accept="image/*"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('image') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('image')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.paintings.form.fields.description.label') }}
                </label>
                <textarea id="description" name="description" rows="5"
                    placeholder="{{ __('ui.paintings.form.fields.description.placeholder') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent @error('description') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">{{ old('description', $painting->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
        {{ __('ui.paintings.form.fields.category.label') }}
    </label>
    <select id="category" name="category"
        class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white">
        <option value="">-- {{ __('ui.paintings.form.fields.category.placeholder') }} --</option>
        <option value="acrylique" {{ old('category', $painting->category ?? '') == 'acrylique' ? 'selected' : '' }}>{{ __('ui.paintings.form.fields.options.acrylique') }}</option>
        <option value="gouache" {{ old('category', $painting->category ?? '') == 'gouache' ? 'selected' : '' }}>{{ __('ui.paintings.form.fields.options.gouache') }}</option>
        <option value="aquarelle" {{ old('category', $painting->category ?? '') == 'aquarelle' ? 'selected' : '' }}>{{ __('ui.paintings.form.fields.options.aquarelle') }}</option>
        <option value="huile" {{ old('category', $painting->category ?? '') == 'huile' ? 'selected' : '' }}>{{ __('ui.paintings.form.fields.options.huile') }}</option>
    </select>
</div>

            <div class="mb-4">
                <label for="dimensions" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.paintings.form.fields.dimensions.label') }}
                </label>
                <input id="dimensions" type="text" name="dimensions" value="{{ old('dimensions', $painting->dimensions) }}"
                    placeholder="{{ __('ui.paintings.form.fields.dimensions.placeholder') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent @error('dimensions') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('dimensions')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.paintings.form.fields.year.label') }}
                </label>
                <input id="year" type="number" name="year" value="{{ old('year', $painting->year) }}"
                    placeholder="{{ __('ui.paintings.form.fields.year.placeholder') }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-teal-500 dark:focus:ring-purple-500 focus:border-transparent @error('year') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('year')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div class="flex gap-2">
                        <a href="{{ url('/paintings/' . $painting->id) }}"
                            class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                            {{ __('ui.paintings.form.actions.cancel') }}
                        </a>
                        <button type="submit" form="delete-painting-form"
                            onclick="return confirm('{{ __('ui.paintings.form.actions.delete_confirm') }}')"
                            class="px-4 py-2 bg-red-600 dark:bg-red-900 text-white rounded-md hover:bg-red-700 dark:hover:bg-red-800 cursor-pointer">
                            {{ __('ui.paintings.form.actions.delete') }}
                        </button>
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 cursor-pointer">
                        {{ __('ui.paintings.form.actions.submit') }}
                    </button>
                </div>
            </footer>
        </form>

        <form id="delete-painting-form" method="POST" action="{{ url('/paintings/' . $painting->id) }}" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </article>
</x-default-layout>
