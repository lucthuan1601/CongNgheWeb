<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.header')
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>