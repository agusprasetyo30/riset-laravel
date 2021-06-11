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
               <td>
                  <a href="{{ route('test.matakuliah.show', $item->uuid) }}">{{ $item->nama }}</a>
               </td>
               <td>
                  @if ($item->status == "ACTIVE")
                     <span class="badge badge-success">ACTIVE</span>

                  @else
                     <span class="badge badge-danger">INACTIVE</span>
                  @endif
               </td>
               <td>
                  <a href="{{ route('test.matakuliah.edit', $item->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                  <a href="{{ route('test.matakuliah.destroy', $item->uuid) }}" class="btn btn-danger btn-sm">Hapus</a>
               </td>
         </tr>
         @endforeach
      </tbody>
      <tfoot>
         <tr>
            <td colspan=4>
               {{ $mata_kuliah->appends(Request::all())->links() }}
            </td>
         </tr>
      </tfoot>
   </table>
@endsection