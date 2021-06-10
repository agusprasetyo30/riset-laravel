@extends('layouts.template')

@section('title', 'Tambah Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Tambah Mata Kuliah</h2>

   <div class="row justify-content-center">
      <div class="col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="form-group">
                  <label for="nama">Nama Mata Kuliah</label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Mata Kuliah">
                  <small id="nama-error" class="text-danger"></small>
               </div>
               
               <div class="form-group">
                  <label for="status">Status</label>
                  <select name="status" id="status" class="form-control">
                     <option value="ACTIVE">ACTIVE</option>
                     <option value="INACTIVE">INACTIVE</option>
                  </select>
               </div>
               
               <div class="form-group">
                  <button type="button" class="btn btn-success simpan">Simpan</button>
                  <a href="{{ route('test.matakuliah.index') }}" class="btn btn-primary">Kembali</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

@push('js')
   <script src="{{ asset('js/frontend/mata-kuliah/create.js') }}"></script>
@endpush