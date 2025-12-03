<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Post Container -->
            <div class="bg-white sm:rounded-lg p-6 shadow">

                <!-- Post Details -->
                <h2 class="text-5xl font-bold mb-4">{{ $post->title }}</h2>

                <!-- Post Author -->
                <p class="text-gray-700 mb-2">
                    <span class="font-semibold">Author:</span>
                    <a href="{{ route('profiles.show', $post->profile->id) }}" class="text-blue-600 hover:underline">
                        {{ $post->profile->profile_name ?? 'Unknown' }}
                    </a>
                </p>

                <!-- Post's Cards -->
                <p class="text-gray-700 mb-6">
                    <span class="font-semibold">Cards:</span>
                    @if($post->cards->isNotEmpty())
                        @foreach($post->cards as $card)
                            <a href="{{ route('cards.show', $card->id) }}" class="text-blue-600 hover:underline capitalize">
                                {{ $card->name }}
                            </a>
                        @endforeach
                    @else
                        No cards are attached to this post
                    @endif
                </p>

                <!-- Post's Content -->
                <p class="text-gray-700 mb-6">
                    {{ $post->content }}
                </p>

                <!-- Back -->
                <a href="{{ route('posts.index') }}"
                class="text-blue-600 hover:underline">
                    ← Back to Posts
                </a>
            </div>

            <!-- Comments Section -->
            <div class="bg-white sm:rounded-lg p-6 shadow">
                <h3 class="text-3xl font-bold mb-4">Comments</h3>
                    <ul>
                        @foreach ($post->comments as $comment)
                            <li class="border-b pb-3">
                                <!-- Comment author -->
                                <p class="font-semibold text-lg">
                                    <a href="{{ route('profiles.show', $comment->profile->id) }}" class="text-blue-600 hover:underline">
                                        {{ $comment->profile->profile_name ?? 'Unknown' }}
                                    </a>
                                </p>
                                <!-- Comment content -->
                                <p class="text-gray-600 mt-1">
                                    {{ $comment->content}}
                                </p>
                            </li>
                        @endforeach
                    </ul>
            </div>
        </div>
    </div>
</x-app-layout>
