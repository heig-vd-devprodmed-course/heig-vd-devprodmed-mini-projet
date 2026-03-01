<x-default-layout>
    <x-slot:title>
        {{ __('ui.posts.show.title', [
            'post_title' => $post->title,
            'first_name' => $post->user->first_name,
            'last_name' => $post->user->last_name,
        ]) }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.posts.show.description', [
            'post_title' => $post->title,
            'first_name' => $post->user->first_name,
            'last_name' => $post->user->last_name,
        ]) }}
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">
                {{ $post->title }}
            </h1>

            <p class="text-sm text-gray-600 dark:text-gray-400">
                <span>
                    {{ __('ui.posts.show.author', [
                        'first_name' => $post->user->first_name,
                        'last_name' => $post->user->last_name,
                    ]) }}
                </span>
                ·
                <span title="{{ $post->created_at->isoFormat('LLLL') }}">
                    {{ $post->created_at->diffForHumans() }}
                </span>
                ·
                <span class="font-semibold">
                    {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
                </span>
            </p>
        </header>

        <div class="mb-4">
            <p class="mt-4 dark:text-gray-300">
                {{ $post->content }}
            </p>
        </div>

        <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap gap-2">
                @forelse ($post->likes as $user)
                    <li class="flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                        <span class="font-semibold">{{ '@' . $user->username }}</span>
                        <span>
                            @if ($user->pivot->reaction === 'like')
                                👍
                            @elseif($user->pivot->reaction === 'love')
                                ❤️
                            @elseif($user->pivot->reaction === 'haha')
                                😂
                            @elseif($user->pivot->reaction === 'wow')
                                😮
                            @elseif($user->pivot->reaction === 'sad')
                                😢
                            @elseif($user->pivot->reaction === 'angry')
                                😡
                            @endif
                        </span>
                    </li>
                @empty
                    <span class="text-sm text-gray-600 dark:text-gray-400">Aucune réaction</span>
                @endforelse
            </ul>
        </footer>
    </article>
</x-default-layout>
