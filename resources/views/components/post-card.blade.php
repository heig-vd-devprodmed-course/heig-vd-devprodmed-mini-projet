<article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
    <header class="mb-4">
        <div class="flex items-center gap-3 mb-3">
            <a href="{{ url('@' . $post->user->username) }}">
                <div
                    class="h-10 w-10 rounded-full bg-teal-600 dark:bg-purple-900 flex items-center justify-center text-white font-semibold hover:bg-teal-700 dark:hover:bg-purple-800">
                    {{ strtoupper(substr($post->user->first_name, 0, 1) . substr($post->user->last_name, 0, 1)) }}
                </div>
            </a>
            <div>
                <a href="{{ url('@' . $post->user->username) }}" class="hover:underline">
                    <p class="font-semibold text-gray-900 dark:text-white">
                        {{ $post->user->first_name }} {{ $post->user->last_name }}
                    </p>
                </a>
                <p class="text-sm text-gray-500 dark:text-gray-400" title="{{ $post->created_at->isoFormat('LLLL') }}">
                    {{ $post->created_at->diffForHumans() }}
                </p>

                {{-- Badge catégorie cliquable qui mène vers la page du genre --}}
                @if ($post->category)
                    <a href="{{ url('/categories/' . $post->category->slug) }}"
                        class="inline-block mt-1 px-2 py-0.5 text-xs font-semibold bg-teal-100 dark:bg-purple-900 text-teal-800 dark:text-purple-200 rounded-full hover:opacity-80">
                        {{ $post->category->name }}
                    </a>
                @endif

            </div>
        </div>
        @if ($post->title)
            <a href="{{ url('/posts/' . $post->id) }}">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ $post->title }}
                </h2>
            </a>
        @endif
    </header>

    <div class="mb-4">
        <a href="{{ url('/posts/' . $post->id) }}">
            <p class="text-gray-700 dark:text-gray-300">
                {{ $post->content }}
            </p>
        </a>
    </div>

    <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400">
            <a href="{{ url('/posts/' . $post->id) }}" class="font-semibold">
                {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
            </a>
            <a href="{{ url('/posts/' . $post->id) }}"
                class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800">
                {{ __('ui.posts.view_post') }}
            </a>
        </div>
    </footer>
</article>
