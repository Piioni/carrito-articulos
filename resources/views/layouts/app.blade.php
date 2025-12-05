<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex min-h-screen flex-col">
        @include('components.ui.header')

        <main class="container mx-auto flex-1 px-4 py-8">
            @yield('content')
        </main>

        @include('components.ui.footer')
    </body>
</html>
