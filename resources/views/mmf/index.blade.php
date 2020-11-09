@extends('layouts.template')

@section('title', 'Test MMF')

@section('content')
   <div class="m-3">
      <h2 class="text-center">Test PT. MMF</h2>
      <h4 class="text-center">Mahasiswa Mengambil Mata Kuliah</h4>

      <div class="mb-2">
         <a href="{{ route('test.mahasiswa.index') }}" class="btn btn-primary btn-sm">Mahasiswa</a>
         <a href="{{ route('test.matakuliah.index') }}" class="btn btn-primary btn-sm">Mata Kuliah</a>
      </div>
      <table class="table table-bordered table-hover table-striped">
         <thead>
            <tr>
               <th>#</th>
               <th>Nama Mahasiswa</th>
               <th>Alamat</th>
               <th width="300px">Mata Kuliah Diambil</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($mahasiswa as $index => $item)
               <tr>
                  <td>{{ ++$index }}. </td>
                  <td>{{ $item->nama }}</td>
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
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection