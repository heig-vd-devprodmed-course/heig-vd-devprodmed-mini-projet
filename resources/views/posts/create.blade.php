<x-default-layout>
    <x-slot:title>
        {{ __('ui.posts.create.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.posts.create.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">
                {{ __('ui.posts.create.title') }}
            </h1>

            <p class="mt-4 dark:text-gray-300">
                {{ __('ui.posts.create.description', ['app_name' => config('app.name')]) }}
            </p>
        </header>

        {{-- Formulaire à venir... --}}
    </article>
</x-default-layout>
