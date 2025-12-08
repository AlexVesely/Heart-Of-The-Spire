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
                class="text-blue-600 hover:underline block mb-4">
                    ← Back to Posts
                </a>

                <!-- Edit -->
                @if($post->profile_id == Auth::user()->profile->id || Auth::user()->profile->is_admin)
                    <a href="{{ route('posts.edit', $post->id) }}"
                    class="block w-fit bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 mb-4">
                        Edit
                    </a>
                @endif

                <!-- Delete -->
                @if($post->profile_id == Auth::user()->profile->id || Auth::user()->profile->is_admin)
                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
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

            <!-- Comment Form -->
            <div class="mt-6">
                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    <!-- DO NOT SHOW THE POSTS ID TO THE USER, BUT THIS INFO IS-->
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <textarea name="content"
                            class="w-full border rounded p-2 resize-none"
                            placeholder="Write a comment..."
                            required></textarea>

                    <button type="submit"
                        class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Post Comment
                    </button>
                </form>
            </div>

            </div>
        </div>
    </div>
</x-app-layout>
