@extends('layouts.template')

@section('title', 'Tambah Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Ambil Mata Kuliah</h2>
   <p class="text-center">[ {{ $mahasiswa->nama .' - '. $mahasiswa->kelas }} ]</p>

   <a href="{{ route('test.mahasiswa.index') }}" class="btn btn-primary btn-sm mb-2 float-right">Kembali</a>

   <table class="table table-bordered table-hover table-striped">
      <thead>
         <tr>
            <th>#</th>
            <th>Mata Kuliah</th>
            <th>Status</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @php $status = false; @endphp

         @foreach ($mata_kuliah as $index => $item)
            <tr>
               <td>{{ ++$index }}. </td>
               <td>{{ $item->nama }}</td>
               <td>
                  {{-- Cek Apakah sudah terdaftar atau belum --}}

                  @for ($i = 0; $i < $mahasiswa->mata_kuliah->count(); $i++)
                     @if ($mahasiswa->mata_kuliah[$i]->pivot->mata_kuliah_id == $item->id)
                        @php $status = true; @endphp

                     @endif

                  @endfor

                  {{-- Cek Status --}}
                  @if ($status)
                     <span class="badge badge-success">Sudah Diambil</span>
                     
                  @else
                     <span class="badge badge-primary">Belum Diambil</span>
                  @endif


               </td>
               <td>
                  @if ($status)
                     <a href="{{ route('test.mahasiswa.ambil-matkul.process', ['id' => $mahasiswa->id, 'matkul' => $item->id, 'type' => 'delete']) }}" class="btn btn-sm btn-danger">Batalkan</a>

                  @else
                     <a href="{{ route('test.mahasiswa.ambil-matkul.process', ['id' => $mahasiswa->id, 'matkul' => $item->id, 'type' => 'add']) }}" class="btn btn-sm btn-success">Ambil Matkul</a>
                  
                  @endif
               </td>
               @php $status = false; @endphp

            </tr>
         @endforeach
         {{-- @foreach ($mahasiswa as $index => $item)
            <tr>
               <td>{{ ++$index }}. </td>
               <td>{{ $item->nama }}</td>
               <td>{{ $item->kelas }}</td>
               <td>{{ $item->jk }}</td>
               <td>{{ $item->alamat }}</td>
               <td> 
                  <span class="badge badge-success">Pemrograman Dasar</span>
               </td>
               <td>
                  <a href="{{ route('test.mahasiswa.ambil-matkul', $item->id) }}" class="btn btn-success btn-sm">Ambil Matkul</a>
                  <a href="{{ route('test.mahasiswa.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <a href="{{ route('test.matakuliah.destroy', $item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
               </td>
         </tr> 
         @endforeach--}}

      </tbody>
   </table>
@endsection