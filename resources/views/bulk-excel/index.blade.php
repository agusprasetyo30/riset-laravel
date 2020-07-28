@extends('layouts.template')

@section('title', 'Bulk Excel')

@section('content')
   <a href="{{ route('welcome') }}">< Back</a>

   <h1 class="text-center">Dummy data</h1>
   
   <div class="float-left mt-2 mb-2">
      <a href="{{ route('excel.print.import-page') }}" class="btn btn-dark" title="Halaman import">Import</a>
   </div>

   <div class="float-right mt-2 mb-2">
      <a href="{{ route('excel.print.collection') }}" class="btn btn-primary" title="Untuk laporan dengan ukuran standart/tidak terlalu banyak">Print [Collection]</a>
      <a href="{{ route('excel.print.query') }}" class="btn btn-primary" title="Untuk laporan dengan ukuran banyak/bigdata">Print [Query]</a>
      <a href="{{ route('excel.print.view') }}" class="btn btn-primary" title="Untuk laporan dengan tampilan tabel pada view">Print [Table]</a>
   </div>
   <table class="table table-bordered table-hover mt-2">
      <thead>
         <tr class="text-center">
            <th width="10px">#</th>
            <th>Todo</th>
            <th width="150px">Status</th>
            <th width="150px">Tanggal Buat</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($todo_data as $no => $todo)
            <tr>
               <td>{{ ++$no }}. </td>
               <td>
                  <p>
                     {{ $todo->todo }}
                  </p>
               </td>
               <td class="text-center">
                  <label class="badge {{ $todo->status == 'SHOW' ? 'badge-success' : 'badge-danger' }}">{{ $todo->status }}</label>
               </td>
               <td class="text-center">
                  <label class="badge badge-success">
                     {{ date('d-M-Y H:i:s', strtotime($todo->created_at)) }}
                  </label>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
@endsection