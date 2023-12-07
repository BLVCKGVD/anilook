<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title', 'Anilook')</title>
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<main>
    @include('particles.topNavBar')
    <section>
        @yield('main')
    </section>
</main>
<script></script>
</body>
</html>
