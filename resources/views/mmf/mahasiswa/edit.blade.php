@extends('layouts.template')

@section('title', 'Edit Mahasiswa')

@section('content')
   <h2 class="text-center m-3">Edit Mahasiswa</h2>

   <div class="row justify-content-center">
      <div class="col-md-6">
         <form name="mahasiswaFormEdit" id="mahasiswaFormEdit">
            <div class="card">
               <div class="card-body">
                  <div class="form-group">
                     <label for="nama">Nama Mahasiswa</label>
                     <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Mata Kuliah" value="{{ $mahasiswa->nama }}">
                     <small class="text-danger" id="nama-error"></small>
                  </div>

                  <div class="form-group">
                     <label for="kelas">Kelas</label>
                     <select name="kelas" id="kelas" class="form-control">
                        <option value="MI-3A" {{ $mahasiswa->kelas == "MI-3A" ? ' selected' : ''}} >MI-3A</option>
                        <option value="MI-3B" {{ $mahasiswa->kelas == "MI-3B" ? ' selected' : ''}} >MI-3B</option>
                        <option value="MI-3C" {{ $mahasiswa->kelas == "MI-3C" ? ' selected' : ''}} >MI-3C</option>
                        <option value="MI-3D" {{ $mahasiswa->kelas == "MI-3D" ? ' selected' : ''}} >MI-3D</option>
                        <option value="MI-3E" {{ $mahasiswa->kelas == "MI-3E" ? ' selected' : ''}} >MI-3E</option>
                        <option value="MI-3F" {{ $mahasiswa->kelas == "MI-3F" ? ' selected' : ''}} >MI-3F</option>
                     </select>
                  </div>
                  
                  <div class="form-group">
                     <label for="jk">Jenis Kelamin</label>
                     <select name="jk" id="jk" class="form-control">
                        <option value="L" {{ $mahasiswa->jk == "L" ? " selected" : '' }}>Laki-laki</option>
                        <option value="P" {{ $mahasiswa->jk == "P" ? " selected" : '' }}>Perempuan</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="alamat">Alamat</label>
                     <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control">{{ $mahasiswa->alamat }}</textarea>
                  </div>
                  
                  <input type="hidden" name="mahasiswa_uuid" id="mahasiswa_uuid" value="{{ $mahasiswa->uuid }}">

                  <div class="form-group">
                     <button type="button" class="btn btn-success simpan">Simpan</button>
                     <a href="{{ route('test.mahasiswa.index') }}" class="btn btn-primary">Kembali</a>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
@endsection

@push('js')
   <script src="{{ asset('js/frontend/mahasiswa/edit.js') }}"></script>
@endpush