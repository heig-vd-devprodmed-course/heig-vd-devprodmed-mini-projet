<x-default-layout>
    <x-slot:title>
        {{ __('ui.tokens.index.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.tokens.index.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <h1 class="text-2xl font-bold text-text">
        {{ __('ui.tokens.index.title') }}
    </h1>

    <p class="mt-4 text-text">
        {{ __('ui.tokens.index.description', ['app_name' => config('app.name')]) }}
    </p>

    @if (session('plain_text_token'))
        <div class="mt-6 p-4 bg-action border border-accent rounded-md">
            <p class="text-sm font-medium text-text mb-2">
                {{ __('ui.tokens.index.new_token_created') }}
            </p>
            <code
                class="block break-all text-sm bg-background text-text p-2 rounded border border-border">{{ session('plain_text_token') }}</code>
        </div>
    @endif

    <a href="{{ url('/tokens/create') }}"
        class="mt-6 block w-full px-4 py-2 bg-accent text-text rounded-md hover:bg-action text-center">
        {{ __('ui.tokens.create.title') }}
    </a>

    <div class="mt-8">
        @if ($tokens->isEmpty())
            <p class="text-border">{{ __('ui.tokens.index.no_tokens') }}</p>
        @else
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-border">
                        <th class="py-2 pr-4 text-sm font-medium text-text">
                            {{ __('ui.tokens.index.table.name') }}
                        </th>
                        <th class="py-2 pr-4 text-sm font-medium text-text">
                            {{ __('ui.tokens.index.table.scopes') }}
                        </th>
                        <th class="py-2 pr-4 text-sm font-medium text-text">
                            {{ __('ui.tokens.index.table.last_used_at') }}
                        </th>
                        <th class="py-2 pr-4 text-sm font-medium text-text">
                            {{ __('ui.tokens.index.table.expiration_date') }}

                        </th>
                        <th class="py-2 text-sm font-medium text-text">
                            {{ __('ui.tokens.index.table.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tokens as $token)
                        <tr class="border-b border-border">
                            <td class="py-3 pr-4 text-sm text-text">{{ $token->name }}</td>
                            <td class="py-3 pr-4">
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($token->abilities as $ability)
                                        <span
                                            class="px-2 py-0.5 text-xs rounded bg-border text-text">
                                            {{ $ability }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="py-3 pr-4 text-sm text-border">
                                {{ $token->last_used_at?->diffForHumans() ?? __('ui.tokens.index.table.never') }}
                            </td>
                            <td class="py-3 pr-4 text-sm text-border">
                                {{ $token->expires_at?->isoFormat('L') ?? __('ui.tokens.index.table.no_expiry') }}
                            </td>
                            <td class="py-3">
                                <form method="POST" action="{{ url('/tokens/' . $token->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('{{ __('ui.tokens.index.table.delete_confirm') }}')"
                                        class="px-3 py-1 text-sm bg-error text-text rounded hover:bg-red-700 cursor-pointer">
                                        {{ __('ui.tokens.index.table.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-default-layout>
