<x-app-layout>
    <x-slot name="header">
        <header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $profile->profile_name }}'s Profile
            </h1>
        </header>
    </x-slot>

    <main class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Flash Message -->
            @if(session('message'))
                <div class="p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Profile Details -->
            <h2 class="sr-only">Profile Details</h2>
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="space-y-2 text-gray-800 capitalize">
                    <p><span class="font-semibold">Profile Name:</span> {{ $profile->profile_name }}</p>
                    <p><span class="font-semibold">Admin:</span> {{ $profile->is_admin ? 'Yes' : 'No' }}</p>
                    <p><span class="font-semibold">Bio:</span> {{ $profile->bio }}</p>
                    
                    <!-- Favorite Class -->
                    <h2 class="sr-only">Favorite Class</h2>
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

                <!-- Edit Profile Form (only for the logged-in user) -->
                @if(Auth::user()->profile->id === $profile->id)
                    <div class="mt-6 border-t pt-4">
                        <h4 class="font-semibold text-lg mb-4">Edit Your Profile</h4>

                        {{-- Error Messages --}}
                        @if ($errors->any())
                            <h2 class="sr-only">Error Messages</h2>
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                                <p class="font-bold">There were some problems:</p>
                                <ul class="mt-2 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profiles.update', $profile->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Bio -->
                            <h2 class="sr-only">Bio</h2>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Bio</label>
                                <textarea name="bio"
                                          rows="3"
                                          class="mt-1 block w-full rounded-md border-gray-300 p-2"
                                          placeholder="Tell us a little about yourself">{{ old('bio', $profile->bio) }}</textarea>
                            </div>

                            <!-- Favorite Class -->
                            <h2 class="sr-only">Favourite Class</h2>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Favorite Class</label>
                                <select name="fav_class" class="mt-1 block w-full rounded-md border-gray-300">
                                    <option value="">-- Select Class --</option>
                                    <option value="ironclad" {{ old('fav_class', $profile->fav_class) === 'ironclad' ? 'selected' : '' }}>Ironclad</option>
                                    <option value="silent" {{ old('fav_class', $profile->fav_class) === 'silent' ? 'selected' : '' }}>Silent</option>
                                    <option value="defect" {{ old('fav_class', $profile->fav_class) === 'defect' ? 'selected' : '' }}>Defect</option>
                                    <option value="watcher" {{ old('fav_class', $profile->fav_class) === 'watcher' ? 'selected' : '' }}>Watcher</option>
                                </select>
                            </div>

                            <button type="submit"
                                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                                Update Profile
                            </button>
                        </form>
                    </div>
                @endif

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
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Profile's Comments -->
            <div class="bg-white sm:rounded-lg p-6 shadow mt-6">
                <h3 class="text-3xl font-bold mb-4">Comments by {{ $profile->profile_name }}</h3>

                @if($profile->comments->isEmpty())
                    <p class="text-gray-500">This user hasn’t commented on anything yet.</p>
                @else
                    <ul class="space-y-4">
                        @foreach($profile->comments as $comment)
                            <li class="border-b pb-4">
                                <p class="text-gray-800">
                                    {{ $comment->content }}
                                </p>

                                <p class="text-gray-600 text-sm mt-1">
                                    On post:
                                    <a href="{{ route('posts.show', $comment->post->id) }}"
                                    class="hover:underline text-indigo-600 font-medium">
                                    {{ $comment->post->title }}
                                    </a>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            </div>
        </div>
    </main>
</x-app-layout>
