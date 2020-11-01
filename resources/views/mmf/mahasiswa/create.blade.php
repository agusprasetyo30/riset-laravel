@extends('layouts.template')

@section('title', 'Tambah Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Tambah Mahasiswa</h2>

   <div class="row justify-content-center">
      <div class="col-md-6">
         <form action="{{ route('test.mahasiswa.store') }}" method="post">
            @csrf
            <div class="card">
               <div class="card-body">
                  <div class="form-group">
                     <label for="nama">Nama Mahasiswa</label>
                     <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Mata Kuliah">
                  </div>

                  <div class="form-group">
                     <label for="kelas">Kelas</label>
                     <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukan Kelas">
                  </div>
                  
                  <div class="form-group">
                     <label for="jk">Jenis Kelamin</label>
                     <select name="jk" id="jk" class="form-control">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="alamat">Alamat</label>
                     <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"></textarea>
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
