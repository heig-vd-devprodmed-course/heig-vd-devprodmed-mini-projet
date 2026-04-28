<x-default-layout>
    <x-slot:title>
        @if ($painting->title)
            {{ __('ui.paintings.show.title', [
                'painting_title' => $painting->title,
                'first_name' => $painting->user->first_name,
                'last_name' => $painting->user->last_name,
            ]) }}
        @else
            {{ __('ui.paintings.show.title_without_painting_title', [
                'first_name' => $painting->user->first_name,
                'last_name' => $painting->user->last_name,
            ]) }}
        @endif
    </x-slot>

    <x-slot:description>
        @if ($painting->title)
            {{ __('ui.paintings.show.description', [
                'painting_title' => $painting->title,
                'first_name' => $painting->user->first_name,
                'last_name' => $painting->user->last_name,
            ]) }}
        @else
            {{ __('ui.paintings.show.description_without_painting_title', [
                'first_name' => $painting->user->first_name,
                'last_name' => $painting->user->last_name,
            ]) }}
        @endif
    </x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            @if ($painting->title)
                <h1 class="text-3xl font-bold dark:text-white mb-2">
                    {{ $painting->title }}
                </h1>
            @endif

            <p class="text-sm text-gray-600 dark:text-gray-400">
                <a href="{{ url('@' . $painting->user->username) }}">
                    {{ __('ui.paintings.show.author', [
                        'first_name' => $painting->user->first_name,
                        'last_name' => $painting->user->last_name,
                    ]) }}
                </a>
                ·
                <span title="{{ $painting->created_at->isoFormat('LLLL') }}">
                    {{ $painting->created_at->diffForHumans() }}
                </span>
                @can('update', $painting)
                    ·
                    <a href="{{ url('/paintings/' . $painting->id . '/edit') }}">
                        {{ __('ui.paintings.edit.title_without_painting_title') }}
                    </a>
                @endcan
                ·
                <span class="font-semibold">
                    {{ trans_choice('ui.paintings.likes_count', count($painting->likes)) }}
                </span>
            </p>
        </header>

        <div class="mb-6">
            @if ($painting->image_path)
                <img src="{{ asset('storage/' . $painting->image_path) }}" alt="{{ $painting->title }}" class="w-full rounded-lg mb-4">
            @endif
        </div>

        <div class="mb-4">
            <p class="mt-4 dark:text-gray-300">
                {{ $painting->description }}
            </p>
        </div>

        <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
            @auth
                <form method="POST" action="{{ url('/likes/' . $painting->id) }}" class="mb-4">
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
                @forelse ($painting->likes as $user)
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
                        {{ trans_choice('ui.paintings.likes_count', 0) }}
                    </span>
                @endforelse
            </ul>
        </footer>
    </article>
</x-default-layout>
