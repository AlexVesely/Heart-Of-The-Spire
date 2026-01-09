<!DOCTYPE html>
<head>
    <title>Heart of the Spire</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="text-center">
        <!-- Site Logo -->
        <img
            src="{{ asset('images/HotSLogo.png') }}"
            alt="Heart of the Spire Logo"
            class="mx-auto h-32 mb-6"
        >

        <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">
            Heart of the Spire
        </h1>

        <p class="text-gray-600 dark:text-gray-400 mb-8">
            A Slay the Spire social platform for sharing builds, cards, and strategies.
        </p>

        <div class="flex justify-center gap-4">
            @auth
                <div class="flex justify-center gap-4">
                    <a href="{{ route('posts.index') }}"
                    class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                        View Posts
                    </a>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="px-6 py-3 bg-red-600 text-white rounded hover:bg-red-700">
                            Log out
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}"
                   class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Log in
                </a>

                <a href="{{ route('register') }}"
                   class="px-6 py-3 bg-gray-300 text-gray-900 rounded hover:bg-gray-400">
                    Register
                </a>
            @endauth
        </div>
    </div>

</body>
</html>
