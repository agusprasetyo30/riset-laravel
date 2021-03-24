@extends('layouts.template')

@section('title', 'Mahasiswa')

@section('content')
   <h2 class="text-center m-3">Mahasiswa</h2>

   <a href="{{ route('test.mahasiswa.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Mahasiswa</a>
   <a href="{{ route('test.index') }}" class="btn btn-primary btn-sm mb-2 float-right">Kembali</a>
   <table class="table table-bordered table-hover table-striped">
      <thead>
         <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>JK</th>
            <th>Alamat</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($mahasiswa as $index => $item)
            <tr>
               <td>{{ ++$index }}. </td>
               <td>
                  <a href="{{ route('test.mahasiswa.show', $item->uuid) }}">{{ $item->nama }}</a>
               </td>
               <td>{{ $item->kelas }}</td>
               <td>{{ $item->jk }}</td>
               <td>{{ $item->alamat }}</td>
               <td>
                  <a href="{{ route('test.mahasiswa.ambil-matkul', $item->uuid) }}" class="btn btn-success btn-sm">Ambil Matkul</a>
                  <a href="{{ route('test.mahasiswa.edit', $item->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                  <a href="#" onclick="document.getElementById('destroy{{$index}}').submit();" class="btn btn-danger btn-sm">Hapus</a>
                  
                  <form action="{{ route('test.mahasiswa.destroy', $item->uuid) }}" method="post" id="destroy{{$index}}">
                     @csrf
                     @method('delete')
                  </form>
               </td>
         </tr>
         @endforeach

      </tbody>
   </table>
@endsection