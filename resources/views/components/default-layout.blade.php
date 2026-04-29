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
                <div class="flex items-center gap-4">
                    <a href="{{ url('/') }}" class="block hover:opacity-80 transition">
                        {{ config('app.name') }}
                    </a>
                    <a href="{{ url('/paintings') }}"
                        class="block bg-teal-700 dark:bg-purple-900 px-3 py-1 rounded-md hover:bg-teal-800 dark:hover:bg-purple-800">
                        {{ __('ui.paintings.index.title') }}
                    </a>
                </div>

                @auth
                <div class="flex items-center gap-2">
        @if(Auth::user()->is_admin)
            <span class="text-xs bg-red-600 text-white px-2 py-0.5 rounded-full">Admin</span>
        @endif
                    <a href="{{ url('/my-profile') }}" class="block hover:opacity-80 transition">
                        <div
                            class="h-8 w-8 rounded-full overflow-hidden bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                            @if (Auth::user()->profile_picture)
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                    alt="{{ Auth::user()->username }}" class="w-full h-full object-cover">
                            @else
                                <img src="/icons/profile.svg" alt="{{ Auth::user()->username }}" class="h-8 w-8">
                            @endif
                        </div>
                    </a>
                @else
                    <div class="flex items-center gap-2">
                        <a href="{{ url('/auth/login') }}"
                            class="block px-3 py-1 rounded-md hover:bg-teal-700 dark:hover:bg-slate-700 transition">
                            {{ __('ui.auth.login.title') }}
                        </a>
                        <a href="{{ url('/auth/register') }}"
                            class="block bg-teal-700 dark:bg-purple-900 px-3 py-1 rounded-md hover:bg-teal-800 dark:hover:bg-purple-800 transition">
                            {{ __('ui.auth.register.title') }}
                        </a>
                    </div>
                @endauth
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
