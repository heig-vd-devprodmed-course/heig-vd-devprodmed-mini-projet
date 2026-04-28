<x-default-layout>
    <x-slot:title>
        {{ __('ui.my_profile.show.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.my_profile.show.description') }}
    </x-slot>

    <article class="bg-background rounded-lg shadow-md p-6 text-center border border-border">
        <div class="flex justify-center mb-6">
            <div
                class="w-32 h-32 rounded-full overflow-hidden bg-border flex items-center justify-center">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->username }}"
                        class="w-full h-full object-cover">
                @else
                    <img src="/icons/profile.svg" alt="{{ $user->username }}" class="h-32 w-32 text-border">
                @endif
            </div>
        </div>

        <h1 class="text-2xl font-bold text-text">
            {{ $user->first_name }} {{ $user->last_name }}
        </h1>

        <p class="text-lg text-border mt-1">
            {{ '@' . $user->username }}
        </p>

        <p class="text-border mt-1">
            {{ $user->email }}
        </p>

        <p class="mt-4 text-text">
            {{ __('ui.my_profile.show.member_since', ['date' => $user->created_at->isoFormat('LL')]) }}
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-3 mt-6">
            <a href="{{ url('/my-profile/edit') }}"
                class="px-4 py-2 bg-accent text-text rounded-md hover:bg-action">
                {{ __('ui.my_profile.show.actions.edit') }}
            </a>
            <a href="{{ url('/@' . $user->username) }}"
                class="px-4 py-2 bg-border text-text rounded-md hover:bg-accent">
                {{ __('ui.my_profile.show.actions.view_public') }}
            </a>
            <a href="{{ url('/tokens') }}"
                class="px-4 py-2 bg-border text-text rounded-md hover:bg-accent">
                {{ __('ui.my_profile.show.actions.manage_tokens') }}
            </a>
            <form method="POST" action="{{ url('/auth/logout') }}" class="inline">
                @csrf
                <button type="submit"
                    class="w-full px-4 py-2 bg-error text-text rounded-md hover:bg-red-700 cursor-pointer">
                    {{ __('ui.my_profile.show.actions.logout') }}
                </button>
            </form>
        </div>
    </article>
</x-default-layout>
