<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>@yield('title')</title>
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   @stack('css')

</head>
<body>
   <div class="container">
      {{-- Content --}}
      @yield('content')
   </div>

   {{-- Belum import JQuery dll --}}
   {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

   @stack('js')
</body>
</html>