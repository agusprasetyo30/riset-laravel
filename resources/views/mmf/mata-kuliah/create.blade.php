@extends('layouts.template')

@section('title', 'Tambah Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Tambah Mata Kuliah</h2>

   <div class="row justify-content-center">
      <div class="col-md-6">
         <form action="{{ route('test.matakuliah.store') }}" method="post">
            @csrf
            <div class="card">
               <div class="card-body">
                  <div class="form-group">
                     <label for="nama">Nama Mata Kuliah</label>
                     <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Mata Kuliah">
                  </div>
                  
                  <div class="form-group">
                     <label for="nama">Status</label>
                     <select name="status" id="nama" class="form-control">
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                     </select>
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
