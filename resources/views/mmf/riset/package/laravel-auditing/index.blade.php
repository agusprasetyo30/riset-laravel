@extends('layouts.template')

@section('title', 'Riset Laravel Auditing')

@section('content')
<div class="container">
   <div class="text-left">
      <a href="{{ route('riset-memfis') }}">Back to menu</a>
   </div>

   <div class="text-center mt-3">
      <h1>Laravel Auditing</h1>
      <small>Menerapkan metode <b>Laravel Auditing</b> yang digunakan untuk audit dan menampilkan history dan riwayat perubahan model yang terjadi</small>
      <br>

      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card mt-5">
               <div class="card-title text-left m-2">
                  Pilih Model
               </div>
               <div class="card-body">
                  <a href="{{ route('test.auditing.index', ['model' => 'Mahasiswa']) }}" class="btn btn-primary">Mahasiswa</a>
                  <a href="{{ route('test.auditing.index', ['model' => 'Mata_kuliah']) }}" class="btn btn-primary">Mata Kuliah</a>
                  <a href="{{ route('test.auditing.index', ['model' => 'Post']) }}" class="btn btn-primary">Post</a>
                  <a href="{{ route('test.auditing.index', ['model' => 'Tag']) }}" class="btn btn-primary">Tag</a>
                  <a href="{{ route('test.auditing.index', ['model' => 'User']) }}" class="btn btn-primary">User</a>
                  <a href="{{ route('test.auditing.index', ['model' => 'Video']) }}" class="btn btn-primary">Video</a>
                  
                  <div class="mt-3 text-left">
                     {{ $audits }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection