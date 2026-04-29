<article class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
    <a href="{{ url('/paintings/' . $painting->id) }}" class="block">
        @if ($painting->image_path)
            <img src="{{ asset('storage/' . $painting->image_path) }}" alt="{{ $painting->title }}" class="w-full h-32 object-cover">
        @else
            <div class="w-full h-32 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                <span class="text-gray-400">Pas d'image</span>
            </div>
        @endif
    </a>

    <div class="p-6">
        <header class="mb-4">
            <div class="flex items-center gap-3 mb-3">
                <a href="{{ url('@' . $painting->user->username) }}">
                    <div
                        class="h-10 w-10 rounded-full bg-teal-600 dark:bg-purple-900 flex items-center justify-center text-white font-semibold hover:bg-teal-700 dark:hover:bg-purple-800">
                        {{ strtoupper(substr($painting->user->first_name, 0, 1) . substr($painting->user->last_name, 0, 1)) }}
                    </div>
                </a>
                <div>
                    <a href="{{ url('@' . $painting->user->username) }}" class="hover:underline">
                        <p class="font-semibold text-gray-900 dark:text-white">
                            {{ $painting->user->first_name }} {{ $painting->user->last_name }}
                        </p>
                    </a>
                    <p class="text-sm text-gray-500 dark:text-gray-400" title="{{ $painting->created_at->isoFormat('LLLL') }}">
                        {{ $painting->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
            @if ($painting->title)
                <a href="{{ url('/paintings/' . $painting->id) }}">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ $painting->title }}
                    </h2>
                    @if ($painting->category)
    <span class="inline-block mt-1 px-2 py-0.5 bg-teal-100 dark:bg-purple-900 text-teal-800 dark:text-purple-200 rounded-full text-xs">
        {{ ucfirst($painting->category) }}
    </span>
@endif
                </a>
            @endif
        </header>

        <div class="mb-4">
            <a href="{{ url('/paintings/' . $painting->id) }}">
                <p class="text-gray-700 dark:text-gray-300 line-clamp-2">
                    {{ $painting->description }}
                </p>
            </a>
        </div>

        <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400">
                <a href="{{ url('/paintings/' . $painting->id) }}" class="font-semibold">
                    {{ trans_choice('ui.paintings.likes_count', count($painting->likes)) }}
                </a>
                <a href="{{ url('/paintings/' . $painting->id) }}"
                    class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800">
                    {{ __('ui.paintings.view_painting') }}
                </a>
            </div>
        </footer>
    </div>
</article>
