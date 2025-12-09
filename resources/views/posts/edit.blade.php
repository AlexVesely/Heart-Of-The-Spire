<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
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
                <form method="POST" action="{{ route('posts.update', $post->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="text-sm font-medium">
                            Title
                        </label>                        
                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $post->title) }}"
                            class="mt-1 block w-full rounded-md border-gray-300"
                        >
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label class="text-sm font-medium">Content</label>
                        <textarea
                            name="content"
                            rows="5"
                            class="mt-1 block w-full rounded-md border-gray-300"
                        >{{ old('content', $post->content) }}</textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-2">
                        <a href="{{ route('posts.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Go Back
                        </a>

                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md
                                       hover:bg-indigo-700 focus:outline-none">
                            Update Post
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
