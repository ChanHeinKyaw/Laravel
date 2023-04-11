<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <h1>{{ $blog->title }}</h1>
    <div>{!! $blog->body !!}</div>
    <a href="/">Go Back</a>
    <script src="/js/app.js"></script>
</body>

</html>
