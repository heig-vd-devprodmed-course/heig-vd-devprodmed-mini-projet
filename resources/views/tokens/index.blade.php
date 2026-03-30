<x-default-layout>
    <x-slot:title>
        {{ __('ui.tokens.index.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.tokens.index.description', ['app_name' => config('app.name')]) }}
    </x-slot>

    <h1 class="text-2xl font-bold dark:text-white">
        {{ __('ui.tokens.index.title') }}
    </h1>

    <p class="mt-4 dark:text-gray-300">
        {{ __('ui.tokens.index.description', ['app_name' => config('app.name')]) }}
    </p>

    @if (session('plain_text_token'))
        <div class="mt-6 p-4 bg-yellow-50 dark:bg-yellow-900 border border-yellow-400 dark:border-yellow-600 rounded-md">
            <p class="text-sm font-medium text-yellow-800 dark:text-yellow-200 mb-2">
                {{ __('ui.tokens.index.new_token_created') }}
            </p>
            <code
                class="block break-all text-sm bg-white dark:bg-slate-800 text-gray-900 dark:text-gray-100 p-2 rounded border border-yellow-300 dark:border-yellow-700">{{ session('plain_text_token') }}</code>
        </div>
    @endif

    <a href="{{ url('/tokens/create') }}"
        class="mt-6 block w-full px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 text-center">
        {{ __('ui.tokens.create.title') }}
    </a>

    <div class="mt-8">
        @if ($tokens->isEmpty())
            <p class="text-gray-500 dark:text-gray-400">{{ __('ui.tokens.index.no_tokens') }}</p>
        @else
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="py-2 pr-4 text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('ui.tokens.index.table.name') }}
                        </th>
                        <th class="py-2 pr-4 text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('ui.tokens.index.table.scopes') }}
                        </th>
                        <th class="py-2 pr-4 text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('ui.tokens.index.table.last_used_at') }}
                        </th>
                        <th class="py-2 pr-4 text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('ui.tokens.index.table.expiration_date') }}
                        </th>
                        <th class="py-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('ui.tokens.index.table.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tokens as $token)
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <td class="py-3 pr-4 text-sm dark:text-white">{{ $token->name }}</td>
                            <td class="py-3 pr-4">
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($token->abilities as $ability)
                                        <span
                                            class="px-2 py-0.5 text-xs rounded bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300">
                                            {{ $ability }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="py-3 pr-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ $token->last_used_at?->diffForHumans() ?? __('ui.tokens.index.table.never') }}
                            </td>
                            <td class="py-3 pr-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ $token->expires_at?->isoFormat('L') ?? __('ui.tokens.index.table.no_expiry') }}
                            </td>
                            <td class="py-3">
                                <form method="POST" action="{{ url('/tokens/' . $token->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('{{ __('ui.tokens.index.table.delete_confirm') }}')"
                                        class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
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
