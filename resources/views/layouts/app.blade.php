<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Lab App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <nav>
        <a href="/lab?mode=1">Головна</a> |
        <a href="/lab/about?mode=1">Про нас</a> |
        <a href="/lab/status?mode=1">Статус</a> |
        <a href="/lab/echo/Hello?mode=1">Echo</a>
    </nav>
</header>

<main>
    @yield('content')
</main>
</body>
</html>
