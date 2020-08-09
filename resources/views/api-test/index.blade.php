@extends('layouts.template')

@section('title', 'Data API')

@push('css')
   <style>
      .route {
         /* width: 50%; */
         padding: 10px;
         background: #8080805d;
         font-size: 13px;
      }
   </style>
@endpush

@section('content')
   <a href="{{ route('welcome') }}">< Back</a>
   
   <h3 class="text-center p-4">Data API Laravel</h3>
   
   <p>Route yang digunakan : </p>

   <div class="row">
      <div class="col-md-6 route">
         <p>Untuk Autentifikasi : </p>
         <p>
            <div>1. <b>[POST] localhost::8000/api/login</b></div>
            <div>=> Route yang digunakan untuk login, nantinya akan di tambahkan TOKEN pada tabel users</div>
         </p>
         
         <p>
            <div>2. <b>[POST] localhost::8000/api/register</b></div>
            <div>=> Route yang digunakan untuk Register</div>
         </p>

         <p>
            <div>3. <b>[POST] localhost::8000/api/logout</b></div>
            <div>=> Route yang digunakan untuk Logout</div>
         </p>
      </div>

      <div class="col-md-6 route border-left">
         <p>Untuk Akses Data (Harus Autentifikasi) : </p>
         <p>
            <div>1. <b>[GET] localhost::8000/api/todos</b></div>
            <div>=> Route ini digunakan untuk menampilkan data <b>TODO</b> yang akan ditampilkan dengan bentuk [ JSON ]</div>
         </p>
         <p>
            <div>2. <b>[GET] localhost::8000/api/todos/{todo}</b></div>
            <div>=> Route ini digunakan untuk menampilkan data <b>TODO</b> dengan parameter ID Todo</div>
         </p>
         <p>
            <div>3. <b>[POST] localhost::8000/api/todos</b></div>
            <div>=> Route yang digunakan untuk menambahkan data <b>TODO</b> sesuai dengan body request json</div>
         </p>
         <p>
            <div>4. <b>[PUT] localhost::8000/api/todos/{todo}</b></div>
            <div>=> Route yang digunakan untuk mengupdate data <b>TODO</b> sesuai dengan parameter ID Todo</div>
         </p>
         <p>
            <div>5. <b>[DELETE] localhost::8000/api/todos/{todo}</b></div>
            <div>=> Route yang digunakan untuk menghapus data <b>TODO</b> sesuai dengan parameter ID Todo</div>
         </p>
      </div>
   </div>

   <p class="mt-3">Cara Mengakses API : </p>
   <p>
      1. Jika ingin login, maka mengakses route API login pada body request tersebut 
   </p>

   <img src="{{ asset('img/api-data/body postman.png') }}" width="100%">
   <p>
      2. Setelah selesai, maka mengambil data <b>TOKEN</b> pada tabel <b>users</b>, deengan memasukan <b>authorization Bearer <`TOKEN`></b>. 
      Jangan lupa arahkan ke route yang merupakan <b>Middleware</b> / ['middleware' => 'auth:api']
   </p>
   <img src="{{ asset('img/api-data/header postman.png') }}" width="100%">

   <p>
      3. 
   </p>


   <pre>
      
   </pre>
@endsection