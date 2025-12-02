<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Card Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white sm:rounded-lg p-6 shadow">

                <!-- Card Details -->
                <div class="space-y-2 text-gray-800 capitalize">
                    <p><span class="font-semibold">Name:</span> {{ $card->name }}</p>
                    <p><span class="font-semibold">Energy Cost:</span> {{ $card->energy_cost }}</p>
                    <p><span class="font-semibold">Rarity:</span> {{ $card->rarity }}</p>
                    <p><span class="font-semibold">Type:</span> {{ $card->type }}</p>
                    <p><span class="font-semibold">Class:</span> {{ $card->class }}</p>
                </div>

                <!-- Buttons -->
                <div class="mt-6 flex flex-col items-start gap-3">

                    <!-- Delete -->
                    <form method="POST" action="{{ route('cards.destroy', $card->id) }}">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                            onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>

                    <!-- Back -->
                    <a href="{{ route('cards.index') }}"
                    class="text-blue-600 hover:underline">
                        ← Back to Cards
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
