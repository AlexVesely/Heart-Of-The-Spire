<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $profile->profile_name }}'s Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Profile Details -->
            <div class="bg-white sm:rounded-lg p-6 shadow">
                <div class="space-y-2 text-gray-800 capitalize">
                    <p><span class="font-semibold">Profile Name:</span> {{ $profile->profile_name }}</p>
                    <p><span class="font-semibold">Admin:</span> {{ $profile->is_admin ? 'Yes' : 'No' }}</p>
                    <p><span class="font-semibold">Bio:</span> {{ $profile->bio }}</p>
                    
                    <!-- Favorite Class -->
                    <p>
                        <span class="font-semibold">Favorite Class:</span>
                        @if ($profile->fav_class === 'ironclad')
                            <span class="bg-red-200 text-red-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                {{ $profile->fav_class }}
                            </span>
                        @elseif ($profile->fav_class === 'silent')
                            <span class="bg-green-200 text-green-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                {{ $profile->fav_class }}
                            </span>
                        @elseif ($profile->fav_class === 'defect')
                            <span class="bg-blue-200 text-blue-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                {{ $profile->fav_class }}
                            </span>
                        @elseif ($profile->fav_class === 'watcher')
                            <span class="bg-purple-200 text-purple-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                {{ $profile->fav_class }}
                            </span>
                        @else
                            <span class="bg-gray-200 text-gray-800 text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                {{ $profile->fav_class ?? 'Unknown' }}
                            </span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Profile's Posts -->
            <div class="bg-white sm:rounded-lg p-6 shadow">
                <h3 class="text-3xl font-bold mb-4">Posts by {{ $profile->profile_name }}</h3>

                @if($profile->posts->isEmpty())
                    <p class="text-gray-500">This user hasn’t posted anything yet.</p>
                @else
                    <ul class="space-y-4">
                        @foreach($profile->posts as $post)
                            <li class="border-b pb-4">
                                <a href="{{ route('posts.show', $post->id) }}" class="font-semibold hover:underline text-lg">
                                    {{ $post->title }}
                                </a>
                                <p class="text-gray-600 mt-1">
                                    {{ Str::limit($post->content, 50) }}
                                </p>
                                <p class="text-gray-500 text-sm mt-1">
                                    Posted by: <span class="font-medium">{{ $post->profile->profile_name ?? 'Unknown' }}</span>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
