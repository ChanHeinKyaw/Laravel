<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <nav>
        <li><a href="">main</a></li>
        <li><a href="">about</a></li>
        <li><a href="">contact</a></li>
    </nav>
    @yield('content')
    <script src="/js/app.js"></script>
</body>

</html>
