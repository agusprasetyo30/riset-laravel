@extends('layouts.template')

@section('title', 'Mata Kuliah')

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
            <th width="250px">Mata Kuliah Diambil</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($mahasiswa as $index => $item)
            <tr>
               <td>{{ ++$index }}. </td>
               <td>{{ $item->nama }}</td>
               <td>{{ $item->kelas }}</td>
               <td>{{ $item->jk }}</td>
               <td>{{ $item->alamat }}</td>
               <td> 
                  @if ($item->mata_kuliah->count() == 0)
                     <span class="badge badge-danger">Belum input mata kuliah</span>
                     
                  @else
                     @foreach ($item->mata_kuliah as $mata_kuliah)
                        <span class="badge badge-success">{{ $mata_kuliah->nama }}</span>
                     
                     @endforeach
                  @endif
               </td>
               <td>
                  <a href="{{ route('test.mahasiswa.ambil-matkul', $item->id) }}" class="btn btn-success btn-sm">Ambil Matkul</a>
                  <a href="{{ route('test.mahasiswa.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <a href="{{ route('test.matakuliah.destroy', $item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
               </td>
         </tr>
         @endforeach

      </tbody>
   </table>
@endsection