@extends('layouts.template')

@section('title', 'Test MMF')

@section('content')
   <div class="m-3">
      <h4 class="text-center">Mahasiswa Mengambil Mata Kuliah</h4>

      <div class="mb-2">
         <a href="{{ route('test.mahasiswa.index') }}" class="btn btn-primary btn-sm">Mahasiswa</a>
         <a href="{{ route('test.matakuliah.index') }}" class="btn btn-primary btn-sm">Mata Kuliah</a>
         <div class="float-right">
            <a href="{{ url()->previous() }}">Back to menu</a>
         </div>
      </div>
      <table class="table table-bordered table-hover table-striped">
         <thead>
            <tr>
               <th>#</th>
               <th>Nama Mahasiswa</th>
               <th>Alamat</th>
               <th width="300px">Jumlah yang Mata Kuliah Diambil</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($mahasiswa as $index => $item)
               <tr>
                  <td>{{ ++$index }}. </td>
                  <td><a href="{{ route('test.mahasiswa.show', $item->uuid) }}">{{ $item->nama }}</a></td>
                  <td>{{ $item->alamat }}</td>
                  <td align="center">
                     <b>{{ $item->mata_kuliah->count() }}</b>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection