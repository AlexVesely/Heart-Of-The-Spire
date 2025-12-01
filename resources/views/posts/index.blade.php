<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p>Community Created Posts:</p>

                <ul>
                    @foreach ($posts as $post)
                        <li>
                            <a href="{{ route('posts.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>