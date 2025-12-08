<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cards') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white sm:rounded-lg p-6">

                <ul class="space-y-4">
                    @foreach ($cards as $card)
                        <li class="border-b pb-4">
                            <a href="{{ route('cards.show', $card->id) }}" class="text-lg font-semibold hover:underline">
                                {{ $card->name }}
                            </a>

                            <div class="flex flex-wrap gap-2 mt-2">
                                <!-- Energy -->
                                <span class="bg-yellow-200 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded-full">
                                    ⚡ {{ $card->energy_cost }}
                                </span>

                                <!-- Class -->
                                @if ($card->class === 'ironclad')
                                    <span class="bg-red-200 text-red-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                        {{ $card->class }}
                                    </span>
                                @elseif ($card->class === 'silent')
                                    <span class="bg-green-200 text-green-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                        {{ $card->class }}
                                    </span>
                                @elseif ($card->class === 'defect')
                                    <span class="bg-blue-200 text-blue-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                        {{ $card->class }}
                                    </span>
                                @elseif ($card->class === 'watcher')
                                    <span class="bg-purple-200 text-purple-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                        {{ $card->class }}
                                    </span>
                                @else
                                    <span class="bg-gray-200 text-gray-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                        {{ $card->class ?? 'Unknown' }}
                                    </span>
                                @endif

                                <!-- Type -->
                                <span class="bg-orange-200 text-orange-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                    {{ $card->type }}
                                </span>

                                <!-- Rarity -->
                                <span class="bg-gray-200 text-gray-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                    {{ $card->rarity }}
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ route('cards.create') }}" class="inline-block mt-4 text-green-600 hover:text-green-800 font-medium">
                    Create Card
                </a>
                
                <!-- Pagination Links -->
                <div class="mt-6">
                    {{ $cards->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
