<x-default-layout>
    <x-slot:title>
        @if ($post->title)
            {{ __('ui.posts.show.title', [
                'post_title' => $post->title,
                'first_name' => $post->user->first_name,
                'last_name' => $post->user->last_name,
            ]) }}
        @else
            {{ __('ui.posts.show.title_without_post_title', [
                'first_name' => $post->user->first_name,
                'last_name' => $post->user->last_name,
            ]) }}
        @endif
    </x-slot>

    <x-slot:description>
        @if ($post->title)
            {{ __('ui.posts.show.description', [
                'post_title' => $post->title,
                'first_name' => $post->user->first_name,
                'last_name' => $post->user->last_name,
            ]) }}
        @else
            {{ __('ui.posts.show.description_without_post_title', [
                'first_name' => $post->user->first_name,
                'last_name' => $post->user->last_name,
            ]) }}
        @endif
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            @if ($post->title)
                <h1 class="text-3xl font-bold dark:text-white mb-2">
                    {{ $post->title }}
                </h1>
            @endif

            <p class="text-sm text-gray-600 dark:text-gray-400">
                <a href="{{ url('@' . $post->user->username) }}">
                    {{ __('ui.posts.show.author', [
                        'first_name' => $post->user->first_name,
                        'last_name' => $post->user->last_name,
                    ]) }}
                </a>
                ·
                <span title="{{ $post->created_at->isoFormat('LLLL') }}">
                    {{ $post->created_at->diffForHumans() }}
                </span>
                @can('update', $post)
                    ·
                    <a href="{{ url('/posts/' . $post->id . '/edit') }}">
                        {{ __('ui.posts.edit.title_without_post_title') }}
                    </a>
                @endcan
                ·
                <span class="font-semibold">
                    {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
                </span>
            </p>
        </header>

        <div class="mb-6">
            @if ($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full rounded-lg mb-4">
            @endif
        </div>

        <div class="mb-4">
            <p class="mt-4 dark:text-gray-300">
                {{ $post->description }}
            </p>
        </div>

        <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
            @auth
                <form method="POST" action="{{ url('/likes/' . $post->id) }}" class="mb-4">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap justify-between gap-2">
                        <button type="submit" name="reaction" value="like"
                            class="w-12 h-12 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer {{ $reaction === 'like' ? 'ring-2 ring-teal-600 dark:ring-purple-900' : '' }}">
                            👍
                        </button>
                        <button type="submit" name="reaction" value="love"
                            class="w-12 h-12 rounded-full cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600 {{ $reaction === 'love' ? 'ring-2 ring-teal-600 dark:ring-purple-900' : '' }}">
                            ❤️
                        </button>
                        <button type="submit" name="reaction" value="haha"
                            class="w-12 h-12 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer {{ $reaction === 'haha' ? 'ring-2 ring-teal-600 dark:ring-purple-900' : '' }}">
                            😂
                        </button>
                        <button type="submit" name="reaction" value="wow"
                            class="w-12 h-12 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer {{ $reaction === 'wow' ? 'ring-2 ring-teal-600 dark:ring-purple-900' : '' }}">
                            😮
                        </button>
                        <button type="submit" name="reaction" value="sad"
                            class="w-12 h-12 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer {{ $reaction === 'sad' ? 'ring-2 ring-teal-600 dark:ring-purple-900' : '' }}">
                            😢
                        </button>
                        <button type="submit" name="reaction" value="angry"
                            class="w-12 h-12 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer {{ $reaction === 'angry' ? 'ring-2 ring-teal-600 dark:ring-purple-900' : '' }}">
                            😡
                        </button>
                    </div>
                </form>
            @endauth
            <ul class="flex flex-wrap gap-2">
                @forelse ($post->likes as $user)
                    <li class="flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                        <a href="{{ url('@' . $user->username) }}" class="font-semibold hover:underline">
                            {{ '@' . $user->username }}
                        </a>
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
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        {{ trans_choice('ui.posts.likes_count', 0) }}
                    </span>
                @endforelse
            </ul>
        </footer>
    </article>
</x-default-layout>
