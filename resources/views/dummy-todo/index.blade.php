@extends('layouts.template')

@section('title', 'Dummy Todo')

@section('content')
   <div class="row p-4">
      <div class="col-md-12 text-center">
         <h1>Dummy Todo</h1>
      </div>

      <a href="{{ route('welcome') }}" class="btn btn-warning mr-2">< Halaman Riset</a>
      <a href="{{ route('dummy.index', ['type' => 'add']) }}" class="btn btn-success">Tambah</a>
      <table class="table table-bordered table-hover mt-2">
         <thead>
            <tr class="text-center">
               <th width="10px">#</th>
               <th>Todo</th>
               <th width="150px">Status</th>
               <th width="150px">Tanggal Buat</th>
               <th width="200px">Aksi</th>
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
                  <td class="text-center">
                     <div class="btn-group-sm">
                        <a href="{{ route('dummy.index', ['type' => 'edit', 'id' => $todo->id]) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('dummy.delete', ['id' => $todo->id]) }}" class="btn btn-danger">Hapus</a>
                     </div>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection