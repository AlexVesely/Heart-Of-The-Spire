<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Card Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Card Details -->
            <div class="bg-white sm:rounded-lg p-6 shadow">
                <div class="space-y-2 text-gray-800 capitalize">
                    <p><span class="font-semibold">Name:</span> {{ $card->name }}</p>
                    <p><span class="font-semibold">Energy Cost:</span> {{ $card->energy_cost }}</p>
                    <p><span class="font-semibold">Rarity:</span> {{ $card->rarity }}</p>
                    <p><span class="font-semibold">Type:</span> {{ $card->type }}</p>
                    <p><span class="font-semibold">Class:</span> {{ $card->class }}</p>
                    <p><span class="font-semibold">Card Text:</span> {{ $card->card_text }}</p>
                </div>

            <!-- Buttons -->
            <div class="mt-2 flex flex-col items-start gap-2">
                <!-- Delete -->
                @if (Auth::user()->profile->is_admin)
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
                @endif

                <!-- Card Image (if exists) -->
                @php
                    // Remove spaces and capitalize each word to match filename
                    $fileName = str_replace(' ', '', ucwords(strtolower($card->name))) . '.png';

                    // Build the full server path to the card image in the public/images folder
                    $imagePath = public_path('images/' . $fileName);
                @endphp

                @if(file_exists($imagePath))
                    <!-- Only if the file actually exists, show the image -->
                    <img src="{{ asset('images/' . $fileName) }}"
                        alt="{{ $card->name }} image"
                        class="mt-2 h-60 w-auto">
                @endif

                <!-- Back -->
                <a href="{{ route('cards.index') }}"
                    class="text-blue-600 hover:underline">
                    ← Back to Cards
                </a>
                </div>
            </div>

            <!-- Posts Connected to This Card -->
                <div class="bg-white sm:rounded-lg p-6 shadow">
                    <h3 class="text-3xl font-bold mb-4">Posts Featuring This Card</h3>

                    @if($card->posts->isNotEmpty())
                        <ul>
                            @foreach($card->posts as $post)
                                <li class="border-b pb-3 mb-3">
                                    <!-- Post title -->
                                    <a href="{{ route('posts.show', $post->id) }}" class="font-semibold text-lg text-blue-600 hover:underline">
                                        {{ $post->title }}
                                    </a>

                                    <!-- Post author with profile pic -->
                                    <p class="text-gray-500 text-sm mt-1 flex items-center gap-2">
                                        Posted by: 

                                        @if($post->profile->profile_img_id)
                                            <img src="{{ asset('images/' . $post->profile->profile_img_id) }}"
                                                alt="{{ $post->profile->profile_name }} profile image"
                                                class="h-6 w-6 rounded-full object-cover">
                                        @endif

                                        <a href="{{ route('profiles.show', $post->profile->id) }}" class="font-medium text-blue-600 hover:underline">
                                            {{ $post->profile->profile_name }}
                                        </a>
                                    </p>

                                    <!-- Shows first 50 characters and then ... -->
                                    <p class="text-gray-600 mt-1">
                                        {{ Str::limit($post->content, 50) }}
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600">No posts are connected to this card yet</p>
                    @endif
                </div>

 
    </div>
</x-app-layout>
