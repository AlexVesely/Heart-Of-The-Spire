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
                <h2 class="text-5xl font-bold mb-3">{{ $post->title }}</h2>

                <!-- Post Author -->
                <p class="text-gray-700 mb-2 flex items-center gap-2">
                    <span class="font-semibold">Author:</span>

                    @if($post->profile->profile_img_id)
                        <img src="{{ asset('images/' . $post->profile->profile_img_id) }}"
                            alt="{{ $post->profile->profile_name }} profile image"
                            class="h-8 w-8 rounded-full object-cover">
                    @endif

                    <a href="{{ route('profiles.show', $post->profile->id) }}" class="text-blue-600 hover:underline">
                        {{ $post->profile->profile_name ?? 'Unknown' }}
                    </a>
                </p>

                <!-- Post's Cards -->
                <p class="text-gray-700 mb-3">
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
                <p class="text-gray-700 mb-3">
                    {{ $post->content }}
                </p>

                <!-- Post's Cards Images -->
                @if($post->cards->isNotEmpty())
                    <div class="mt-4 flex flex-wrap gap-4">
                        @foreach($post->cards as $card)
                            @php
                                // Convert card name to CamelCase to match filename
                                $fileName = str_replace(' ', '', ucwords(strtolower($card->name))) . '.png';
                                $imagePath = public_path('images/' . $fileName);
                            @endphp

                            @if(file_exists($imagePath))
                                <a href="{{ route('cards.show', $card->id) }}" title="{{ $card->name }}">
                                    <img src="{{ asset('images/' . $fileName) }}"
                                        alt="{{ $card->name }} image"
                                        class="h-60 w-auto">
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif

                <!-- Back -->
                <a href="{{ route('posts.index') }}"
                class="text-blue-600 hover:underline block mb-4 mt-3">
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
                    <ul id="comments-list">
                        @foreach ($post->comments as $comment)
                            <li class="border-b pb-3">

                                <!-- Author -->
                                <p class="font-semibold text-lg flex items-center gap-2">
                                    @if($comment->profile->profile_img_id)
                                        <img src="{{ asset('images/' . $comment->profile->profile_img_id) }}"
                                            alt="{{ $comment->profile->profile_name }} profile image"
                                            class="h-6 w-6 rounded-full object-cover">
                                    @endif
                                    <a href="{{ route('profiles.show', $comment->profile->id) }}" class="text-blue-600 hover:underline">
                                        {{ $comment->profile->profile_name }}
                                    </a>
                                </p>

                                <!-- Content -->
                                <p class="text-gray-600 mt-1">
                                    {{ $comment->content }}
                                </p>

                                <!-- Edit/Delete Buttons -->
                                @if ($comment->profile_id == Auth::user()->profile->id || Auth::user()->profile->is_admin)
                                    <div class="mt-2 flex gap-3">

                                        <!-- Edit -->
                                        <a href="{{ route('comments.edit', $comment->id) }}"
                                        class="text-yellow-600 hover:underline">
                                            Edit
                                        </a>

                                        <!-- Delete -->
                                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:underline"
                                                onclick="return confirm('Delete this comment?')">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                @endif

                            </li>
                        @endforeach
                    </ul>

            <!-- Comment Form -->
            <div class="mt-6">
                <form id="comment-form" method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    <!-- DO NOT SHOW THE POSTS ID TO THE USER, BUT THIS INFO IS-->
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <textarea id="comment-content" name="content"
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

<script>
/*
This script allows the comment form to submit via AJAX (without a page refresh)
and dynamically adds the new comment to the list on success.
*/

// Wait until the DOM is fully loaded before running the script
document.addEventListener('DOMContentLoaded', function () { 
    const form = document.getElementById('comment-form');
    const commentsList = document.getElementById('comments-list');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission behavior (page reload)

        const formData = new FormData(form); // Create a FormData object from the form, which collects all inputs

        const token = document.querySelector('input[name="_token"]').value; // Grab the CSRF token to send with AJAX request (required by Laravel)

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token, // Laravel expects CSRF token header for security
                'Accept': 'application/json' // Tell server we want JSON back
            },
            body: formData // Snd the form data as the request body
        })
        .then(response => response.json()) // Parse the response from the server as JSON
        .then(data => {
            if (data.success) { // If server returns success
                const newComment = document.createElement('li'); // Add newly added comment and styling to it
                newComment.classList.add('border-b', 'pb-3');

                // Prepare Edit/Delete buttons if allowed
                let buttons = '';
                if (data.comment.can_edit) { // Will be yes because a user is allowed to edit/delete their own comments
                    buttons += `<a href="/comments/${data.comment.id}/edit" class="text-yellow-600 hover:underline">Edit</a>`;
                }
                if (data.comment.can_delete) {
                    buttons += `<form method="POST" action="/comments/${data.comment.id}" style="display:inline;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="${token}">
                                    <button class="text-red-600 hover:underline" onclick="return confirm('Delete this comment?')">Delete</button>
                                </form>`;
                }

                // Build comment HTML
                newComment.innerHTML = `
                    <p class="font-semibold text-lg">
                        <a href="/profiles/${data.comment.profile_id}" class="text-blue-600 hover:underline">
                            ${data.comment.profile_name}
                        </a>
                    </p>
                    <p class="text-gray-600 mt-1">${data.comment.content}</p>
                    <div class="mt-2 flex gap-3">
                        ${buttons}
                    </div>
                `;

                commentsList.prepend(newComment); // Add new comment at the top
                document.getElementById('comment-content').value = ''; // Clear textarea
            }
        })
        .catch(error => console.error(error)); // catch errors
    });
});
</script>
