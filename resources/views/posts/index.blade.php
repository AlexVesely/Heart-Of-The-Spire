<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Flash Message -->
            @if(session('message'))
                <div class="p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <ul>
                    @foreach ($posts as $post)
                        <li class="border-b mb-4 pb-4">
                            <a href="{{ route('posts.show', $post->id) }}" class="font-semibold hover:underline text-lg">
                                {{ $post->title }}
                            </a>
                            <p class="text-gray-600 mt-1">
                                <!--Shows first 50 characters and then ... -->
                                {{ Str::limit($post->content, 50) }}
                            </p>
                            <p class="text-gray-500 text-sm mt-1">
                                Posted by: 
                                <a href="{{ route('profiles.show', $post->profile->id) }}" class="font-medium text-blue-600 hover:underline">
                                    {{ $post->profile->profile_name }}
                                </a>
                            </p>

                        </li>
                    @endforeach
                </ul>

                <!-- Pagination Links -->
                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
