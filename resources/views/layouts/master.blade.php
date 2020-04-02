<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
    </style>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titre')</title>
    </head>
    @include('/layout/partials/_nav')
    <body>
        <body style="background-color:#f2b505;">
            <div class="flex-center position-ref full-height"></div>
            <div class="contenu">
                <div class="title m-b-md">
                    @yield('content')
                </div>

    </body>
    <footer class="main-footer" style="max-height: 10%;text-align: center">
        <strong>Copyright © 2020 <a href=http://lyceekastler.fr>Lycée Alfred Kastler 33400 Talence</a>.</strong> All rights reserved.
    </footer>
</html>