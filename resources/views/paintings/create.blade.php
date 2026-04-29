<x-default-layout>
    <x-slot:title>
        {{ __('ui.paintings.create.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.paintings.create.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">
                {{ __('ui.paintings.create.title') }}
            </h1>

            <p class="mt-4 dark:text-gray-300">
                {{ __('ui.paintings.create.description', ['app_name' => config('app.name')]) }}
            </p>
        </header>

        <form method="POST" action="{{ url('/paintings') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('ui.paintings.form.fields.title.label') }}
                </label>
                <input id="title" type="text" name="title" value="{{ old('title') }}"
                    placeholder="{{ __('ui.paintings.form.fields.title.placeholder') }}"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('title') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
                @error('title')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Image de l'œuvre
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
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('description') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
        Catégorie
    </label>
    <select id="category" name="category"
        class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white">
        <option value="">-- Choisir une catégorie --</option>
        <option value="acrylique" {{ old('category', $painting->category ?? '') == 'acrylique' ? 'selected' : '' }}>Acrylique</option>
        <option value="gouache" {{ old('category', $painting->category ?? '') == 'gouache' ? 'selected' : '' }}>Gouache</option>
        <option value="aquarelle" {{ old('category', $painting->category ?? '') == 'aquarelle' ? 'selected' : '' }}>Aquarelle</option>
        <option value="huile" {{ old('category', $painting->category ?? '') == 'huile' ? 'selected' : '' }}>Peinture à l'huile</option>
    </select>
</div>

            <div class="mb-4">
    <label for="dimensions" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
        Dimensions (ex: 50x70 cm)
    </label>
    <input id="dimensions" type="text" name="dimensions" value="{{ old('dimensions') }}"
        placeholder="ex: 50x70 cm"
        class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('dimensions') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
    @error('dimensions')
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
        Année de création
    </label>
    <input id="year" type="number" name="year" value="{{ old('year') }}"
        placeholder="ex: 2023" min="1800" max="2026"
        class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('year') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 dark:focus:ring-purple-500 @enderror">
    @error('year')
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>

            <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/paintings') }}"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{ __('ui.paintings.form.actions.cancel') }}
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 cursor-pointer">
                        {{ __('ui.paintings.form.actions.submit') }}
                    </button>
                </div>
            </footer>
        </form>
    </article>
</x-default-layout>
