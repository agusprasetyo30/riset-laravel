@extends('layouts.template')

@section('title', 'Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Mata Kuliah</h2>

   <a href="{{ route('test.matakuliah.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Mata Kuliah</a>
   <a href="{{ route('test.index') }}" class="btn btn-primary btn-sm mb-2 float-right">Kembali</a>
   <table class="table table-bordered table-hover table-striped">
      <thead>
         <tr>
            <th>#</th>
            <th>Nama Mata Kuliah</th>
            <th>Status</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($mata_kuliah as $index => $item)
            <tr>
               <td>{{ ++$index }}. </td>
               <td>{{ $item->nama }}</td>
               <td>
                  @if ($item->status == "ACTIVE")
                     <span class="badge badge-success">ACTIVE</span>

                  @else
                     <span class="badge badge-danger">INACTIVE</span>
                  @endif
               </td>
               <td>
                  <a href="{{ route('test.matakuliah.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <a href="{{ route('test.matakuliah.destroy', $item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
               </td>
         </tr>
         @endforeach

      </tbody>
   </table>
@endsection