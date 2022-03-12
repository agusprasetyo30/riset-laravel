@extends('layouts.template')

@section('title', 'Riset Laravel Datatable')

@section('include-modal')
   @include('modals.mahasiswa.modal')
@endsection

@push('css')
   <style>
      #mahasiswa_table_processing {
         border: none;
      }
   </style>
@endpush

@section('content')

   <div class="text-center mt-3">
      <h2>Mahasiswa</h2>
      <small>Menampilkan tabel <b>Mahasiswa</b> menggunakan <b>yajra/laravel-datatable</b></small>
      <b>[ Versi Memfis ]</b>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-10">
         <table class="table table-bordered table-hover table-striped table-checkable mahasiswa_table" id="mahasiswa_table" style="width: 100%;">
            <thead class="text-center">
               <tr>
                  <th width=20%>Nama</th>
                  <th width=20%>Kelas</th>
                  <th width=10%>JK</th>
                  <th width=35%>Alamat</th>
                  <th width=15%>Action</th>
               </tr>
            </thead>
         </table>
      </div>
   </div> 
@endsection



@push('js')
   <script src="{{ asset('vendors/jquery.blockUI.js') }}"></script>
   <script src="{{ asset('js/frontend/mahasiswa/index_memfis.js') }}"></script>
@endpush