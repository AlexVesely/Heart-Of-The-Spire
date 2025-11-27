<html>
    <head>
        <title>@yield('title')</title>
        @vite('resources/css/app.css')
    </head>
    <body class ="bg-gray-500 min-h-screen flex flex-col items-center justify-center p-4">
        <h1>
            Heart of the Spire: @yield('title')
        </h1>

        @if ($errors->any())
            <div>
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
            <p><b>{{ session('message') }}</b></p>
        @endif

        <div class="w-full max-w-xl">
            @yield('content')
        </div>

    </body>
</html>