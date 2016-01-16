<!DOCTYPE html>
<html lang="{{ locale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ isset($article) ? "{$article->title} — Sebastian De Deyne" :  "Sebastian De Deyne" }}</title>

        <meta charset="utf-8">
        <meta name="description" content="content">

        <link rel="stylesheet" href="/css/site.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <script src="/js/site.js" defer></script>
    </head>
    <body class="@yield('body_classes')">
        @yield('content')
    </body>
</html>
