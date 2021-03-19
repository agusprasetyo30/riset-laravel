@extends('layouts.template')

@section('title', $mahasiswa->nama)

@push('css')
   <style>
      .belum_ambil_matkul {
         padding: 5px;
         background: #d6d6d6;
      }
   </style>
@endpush

@section('content')
   <h2 class="text-center m-3">Edit Mahasiswa</h2>

   <div class="row justify-content-center">
      <div class="col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="form-group">
                  <label for="nama">Nama Mahasiswa</label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Mata Kuliah" value="{{ $mahasiswa->nama }}" readonly>
               </div>

               <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukan Kelas" value="{{ $mahasiswa->kelas }}" readonly>
               </div>
               
               <div class="form-group">
                  <label for="jk">Jenis Kelamin</label>
                  <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukan Kelas" value="{{ $mahasiswa->jk == "L" ? "Laki-laki" : "Perempuan" }}" readonly>
               </div>

               <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" readonly>{{ $mahasiswa->alamat }}</textarea>
               </div>

               <div class="form-group">
                  <label for="matkul">Mata Kuliah yang Diambil</label>
                     @if ($mahasiswa->mata_kuliah->count() == 0)
                        <div class="text-center belum_ambil_matkul">
                           Mahasiswa belum mengambil mata kuliah
                        </div>
                  
                     @else
                        <ul>
                           @foreach ($mahasiswa->mata_kuliah as $mata_kuliah)
                              <li>{{ $mata_kuliah->nama }}</li>
                           @endforeach
                        </ul>
                     @endif
               </div>
               
               <div class="form-group">
                  <a href="{{ route('test.mahasiswa.index') }}" class="btn btn-primary">Kembali</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
