<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Card') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                {{-- ERROR MESSAGES --}}
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                        <p class="font-bold">There were some problems:</p>
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- FORM -->
                <form method="POST" action="{{ route('cards.store') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label class="text-sm font-medium">Name</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="mt-1 block w-full rounded-md border-gray-300"
                        >
                    </div>

                    <!-- Energy Cost -->
                    <div class="mb-4">
                        <label class="text-sm font-medium">Energy Cost</label>
                        <input
                            type="text"
                            name="energy_cost"
                            value="{{ old('energy_cost') }}"
                            class="mt-1 block w-full rounded-md border-gray-300"
                        >
                    </div>

                    <!-- Rarity -->
                    <div class="mb-4">
                        <label>Rarity</label>
                        <select name="rarity" class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="">-- Select Rarity --</option>
                            <option value="starter" {{ old('rarity') === 'starter' ? 'selected' : '' }}>Starter</option>
                            <option value="common" {{ old('rarity') === 'common' ? 'selected' : '' }}>Common</option>
                            <option value="uncommon" {{ old('rarity') === 'uncommon' ? 'selected' : '' }}>Uncommon</option>
                            <option value="rare" {{ old('rarity') === 'rare' ? 'selected' : '' }}>Rare</option>
                        </select>
                    </div>

                    <!-- Type -->
                    <div class="mb-4">
                        <label>Type</label>
                        <select name="type" class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="">-- Select Type --</option>
                            <option value="attack" {{ old('type') === 'attack' ? 'selected' : '' }}>Attack</option>
                            <option value="skill" {{ old('type') === 'skill' ? 'selected' : '' }}>Skill</option>
                            <option value="power" {{ old('type') === 'power' ? 'selected' : '' }}>Power</option>
                        </select>
                    </div>


                    <!-- Class -->
                    <div class="mb-4">
                        <label>Class</label>
                        <select name="class" class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="">-- Select Class --</option>
                            <option value="ironclad" {{ old('class') === 'ironclad' ? 'selected' : '' }}>Ironclad</option>
                            <option value="silent" {{ old('class') === 'silent' ? 'selected' : '' }}>Silent</option>
                            <option value="defect" {{ old('class') === 'defect' ? 'selected' : '' }}>Defect</option>
                            <option value="watcher" {{ old('class') === 'watcher' ? 'selected' : '' }}>Watcher</option>
                        </select>
                    </div>

                    <!-- Card Text -->
                    <div class="mb-4">
                        <label>Card Text</label>
                        <textarea
                            name="card_text"
                            rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 resize-none"
                        >{{ old('card_text') }}</textarea>
                    </div>

                    <!-- Buttons -->
                    <div>
                        <a href="{{ route('cards.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Go Back
                        </a>

                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md
                                       hover:bg-indigo-700 focus:outline-none">
                            Create Card
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
