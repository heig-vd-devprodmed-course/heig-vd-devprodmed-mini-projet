<article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
    <header class="mb-4">
        <div class="flex items-center gap-3 mb-3">
            <div
                class="h-10 w-10 rounded-full bg-teal-600 dark:bg-purple-900 flex items-center justify-center text-white font-semibold">
                {{ strtoupper(substr($post->user->first_name, 0, 1) . substr($post->user->last_name, 0, 1)) }}
            </div>
            <div>
                <p class="font-semibold text-gray-900 dark:text-white">
                    {{ $post->user->first_name }} {{ $post->user->last_name }}
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400" title="{{ $post->created_at->isoFormat('LLLL') }}">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        @if ($post->title)
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                {{ $post->title }}
            </h2>
        @endif
    </header>

    <div class="mb-4">
        <p class="text-gray-700 dark:text-gray-300">
            {{ $post->content }}
        </p>
    </div>

    <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
            <span class="font-semibold">
                {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
            </span>
        </div>
    </footer>
</article>
