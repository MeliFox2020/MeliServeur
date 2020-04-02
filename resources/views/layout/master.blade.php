<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
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
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        <strong>Copyright © 2020 <a href=http://lyceekastler.fr>Lycée Alfred Kastler 33400 Talence</a>.</strong> All rights reserved.
    </footer>

</html>
