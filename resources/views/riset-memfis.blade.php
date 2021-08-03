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
               font-size: 60px;
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
         <a class="nav-item nav-link" href="{{ route('welcome') }}">Back to menu</a>

         <div class="nav navbar-nav ml-auto">
               @if (Route::has('login'))
                  @auth
                     <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">Logout</a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>

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
            <h1 class="text-center">Riset MeMFIS</h1>
            <div class="text-center">
               <a href="{{ route('test.index') }}" class="btn btn-primary">Data keperluan riset MeMFIS</a>
            </div>
            <div class="">
               <div class="row">
                  <label class="font-weight-bold">Riset Project Laravel</label>
                  <div class="col-md-12">
                     <a class="btn links bg-warning" href="#">Policy/Policies</a>
                     <a class="btn links" href="{{ route('test.index') }}">Form Request + Fungsi</a>
                     <a class="btn links" href="{{ route('test.poly.dashboard') }}">Polimorphisme</a>
                     <a class="btn links" href="{{ route('test.mahasiswa.index') }}">ScopeOf... (Builder)</a>
                     <a class="btn links bg-dark" href="#">stdClass</a>
                  </div>
               </div>
               <div class="row mt-4">
                  <label class="font-weight-bold">Daftar Package/Library</label>
                  <div class="col-md-12">
                     <a class="btn links" href="{{ route('test.toko.dashboard') }}">nwidart/laravel-modules</a>
                     <a class="btn links" href="{{ route('test.auditing.index') }}">owen-it/laravel-auditing</a>
                     <a class="btn links bg-dark" href="#">spatie/laravel-sortable</a>
                     <a class="btn links bg-dark" href="#">spatie/laravel-activity-log</a>
                     <a class="btn links bg-dark" href="#">spatie/laravel-backup</a>
                     <a class="btn links" href="{{ route('test.query-builder.index') }}">spatie/laravel-query-builder</a>
                     <a class="btn links bg-dark" href="#">spatie/laravel-slugable</a>
                     <a class="btn links bg-dark" href="#">spatie/laravel-tags</a> 
                     <a class="btn links" href="{{ route('test.datatables.mahasiswa') }}">yajra/laravel-datatables-oracle</a>
                     <a class="btn links bg-dark" href="#">league/flysystem-aws-s3-v3</a>
                     <a class="btn links bg-dark" href="#">flynsarmy/csv-seeder</a>
                     <a class="btn links" href="{{ route('test.dompdf.index') }}">barryvdh/laravel-dompdf & iio/libmergepdf</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
