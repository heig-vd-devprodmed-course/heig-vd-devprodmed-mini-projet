<article class="bg-background rounded-lg shadow-md p-6 border border-border">
    <header class="mb-4">
        <div class="flex items-center gap-3 mb-3">
            <a href="{{ url('@' . $post->user->username) }}">
                <div
                    class="h-10 w-10 rounded-full bg-accent flex items-center justify-center text-text font-semibold hover:bg-action">
                    {{ strtoupper(substr($post->user->first_name, 0, 1) . substr($post->user->last_name, 0, 1)) }}
                </div>
            </a>
            <div>
                <a href="{{ url('@' . $post->user->username) }}" class="hover:underline">
                    <p class="font-semibold text-text">
                        {{ $post->user->first_name }} {{ $post->user->last_name }}
                    </p>
                </a>
                <p class="text-sm text-border" title="{{ $post->created_at->isoFormat('LLLL') }}">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        @if ($post->title)
            <a href="{{ url('/posts/' . $post->id) }}">
                <h2 class="text-xl font-bold text-text">
                    {{ $post->title }}
                </h2>
            </a>
        @endif
    </header>

    <div class="mb-4">
        <a href="{{ url('/posts/' . $post->id) }}">
            <p class="text-text">
                {{ $post->content }}
            </p>
        </a>
    </div>

    <footer class="pt-4 border-t border-border">
        <div class="flex items-center justify-between text-sm text-border">
            <a href="{{ url('/posts/' . $post->id) }}" class="font-semibold">
                {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
            </a>
            <a href="{{ url('/posts/' . $post->id) }}"
                class="px-4 py-2 bg-accent text-text rounded-md hover:bg-action">
                {{ __('ui.posts.view_post') }}
            </a>
        </div>
    </footer>
</article>
