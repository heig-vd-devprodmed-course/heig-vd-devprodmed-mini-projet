<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    @isset($description)
        <meta name="description" content="{{ $description }}">
    @endisset
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @isset($title)
        <title>{{ $title }} - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endisset

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col bg-slate-50 dark:bg-slate-900">
    <header class="bg-teal-600 text-white dark:bg-slate-800">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-16 flex items-center justify-between">
                <a href="{{ url('/') }}" class="block hover:opacity-80 transition">
                    {{ config('app.name') }}
                </a>
                <a href="{{ url('/profile') }}" class="block hover:opacity-80 transition">
                    <img src="/icons/profile.svg" alt="{{ __('ui.profile.title') }}" class="h-8 w-8 rounded-full" />
                </a>
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8 sm:px-6 lg:px-8 flex-grow dark:text-white max-w-2xl">
        {{ $slot }}
    </main>

    <footer class="bg-teal-600 text-white text-sm dark:bg-slate-800">
        <div class="container mx-auto px-4 py-6 sm:px-6 lg:px-8">
            <div class="h-16 flex flex-col items-center justify-between gap-4 sm:flex-row">
                <p class="text-center sm:text-left">
                    {{ __('ui.about.copyright', ['year' => date('Y')]) }}
                </p>
                <a href="{{ url('/about') }}" class="block hover:opacity-80 transition">
                    {{ __('ui.about.title') }}
                </a>
            </div>
        </div>
    </footer>
</body>

</html>
