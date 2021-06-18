<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>@yield('title')</title>
   <link rel="stylesheet" href="{{ asset('vendors/bootstrap-4.5.3/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
   
   <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
   {{-- <link rel="stylesheet" href="{{ asset('vendors/datatables/datatables.min.css') }}"> --}}
   {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
   @stack('css')
</head>
<body>
   <div class="container mt-2">

      {{-- <a href="#" class="float-right">{{ \Auth::user()->name }}</a> --}}
      
      {{-- Content --}}
      @yield('content')
   </div>

   {{-- Untuk menginputkan data modal --}}
   @yield('include-modal')

   <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('vendors/sweetalert2/sweetalert2.min.js') }}"></script>
   
   {{-- <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('vendors/datatables/datatables.min.js') }}"></script> --}}
   
   {{-- Belum import JQuery dll --}}
   {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> --}}
   {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

   @stack('js')
</body>
</html>