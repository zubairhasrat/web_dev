
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>

        <!-- CSS And JavaScript -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
                <h1>this is navbar</h1>
            </nav>
        </div>

        @yield('content')

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>