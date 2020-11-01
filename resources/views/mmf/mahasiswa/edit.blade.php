@extends('layouts.template')

@section('title', 'Tambah Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Edit Mahasiswa</h2>

   <div class="row justify-content-center">
      <div class="col-md-6">
         <form action="{{ route('test.mahasiswa.update', $mahasiswa->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
               <div class="card-body">
                  <div class="form-group">
                     <label for="nama">Nama Mahasiswa</label>
                     <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Mata Kuliah" value="{{ $mahasiswa->nama }}">
                  </div>

                  <div class="form-group">
                     <label for="kelas">Kelas</label>
                     <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukan Kelas" value="{{ $mahasiswa->kelas }}">
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
                  
                  <div class="form-group">
                     <input type="submit" value="Simpan" class="btn btn-success">
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
@endsection
