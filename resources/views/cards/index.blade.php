<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white">
            Cards
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p>The cards in Slay the Spire:</p>

                <ul>
                    @foreach ($cards as $card)
                        <li>
                            <a href="{{ route('cards.show', $card->id) }}">
                                {{ $card->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ route('cards.create') }}" class="text-green-600 hover:text-green-800">
                    Create Card
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
