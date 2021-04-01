@extends('layouts.template')

@section('title', 'Riset Laravel Datatable')

@section('content')
   <div class="text-left">
      <a href="{{ url()->previous() }}">Back to menu</a>
   </div>

   <div class="text-center mt-3">
      <h2>Mahasiswa</h2>
      <small>Menampilkan tabel <b>Mahasiswa</b> menggunakan <b>yajra/laravel-datatable</b></small>
   </div>

   <div class="row justify-content-center">
      <div class="col-md-10">
         <table class="table table-bordered table-hover table-striped" id="mahasiswa_table">
            <thead class="text-center">
               <tr>
                  <th width=250>Nama</th>
                  <th width=100>Kelas</th>
                  <th width=100>JK</th>
                  <th>Alamat</th>
               </tr>
            </thead>
         </table>
      </div>
   </div>
@endsection

@push('js')
   <script src="{{ asset('js/frontend/mahasiswa/index.js') }}"></script>
@endpush