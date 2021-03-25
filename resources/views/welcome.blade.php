<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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

            .links{ 
                font-size: 13px;
                color: grey;
                text-decoration: none;
            }

            .links:hover { 
                background: darkslategray;
                transition: 0.3s;
                color: white;
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
                <h1 class="text-center">Welcome to Halaman Utama</h1>
                <h1 class="text-center">Riset Laravel</h1>
                <div class="text-center">
                    <a href="{{ route('riset-laravel') }}" class="btn btn-success" >Riset Laravel</a>
                    <a href="{{ route('riset-memfis') }}" class="btn btn-primary" >Riset MeMFIS</a>
                </div>
            </div>
        </div>
    </body>
</html>
