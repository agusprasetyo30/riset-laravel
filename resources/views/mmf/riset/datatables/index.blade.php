@extends('layouts.template')

@section('title', 'Riset Laravel Datatable')

@section('include-modal')
   @include('modals.mahasiswa.modal')
@endsection

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
         <table class="table table-bordered table-hover table-striped table-responsive table-checkable " id="mahasiswa_table" style="width: 100%;">
            <thead class="text-center">
               <tr>
                  <th width=20%>Nama</th>
                  <th width=20%>Kelas</th>
                  <th width=10%>JK</th>
                  <th width=40%>Alamat</th>
                  <th width=10%>Action</th>
               </tr>
            </thead>
         </table>
      </div>
   </div>
@endsection



@push('js')
   <script src="{{ asset('js/frontend/mahasiswa/index.js') }}"></script>
@endpush