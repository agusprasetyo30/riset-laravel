<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Styles -->
        <style>
            h1{
                font-size: 70px;
            }

            .full-height {
                height: 70vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .links {
                margin-top: 30px;
                text-align: center;
            }

            .links a { 
                font-size: 15px;
                padding: 0px 20px;
                color: black;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav ml-auto">
                @if (Route::has('login'))
                    @auth
                        <a class="nav-item nav-link" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>
        <div class="flex-center position-ref full-height">
            <div class="container">
                <h1 class="text-center">Riset Laravel</h1>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
