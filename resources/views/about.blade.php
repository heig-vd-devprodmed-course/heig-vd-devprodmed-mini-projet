<x-default-layout>
    <x-slot:title>
        {{ __('ui.about.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.about.description') }}
    </x-slot>

    <h1 class="text-2xl font-bold">{{ __('ui.about.title') }}</h1>
    <p class="mt-4">
        {{ __('ui.about.introduction') }}
    </p>
    <p class="mt-4">
        {{ __('ui.about.disclaimer') }}
    </p>
</x-default-layout>
