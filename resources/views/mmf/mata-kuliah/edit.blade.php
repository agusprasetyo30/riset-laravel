@extends('layouts.template')

@section('title', 'Edit Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Edit Mata Kuliah</h2>

   <div class="row justify-content-center">
      <div class="col-md-6">
         <form action="{{ route('test.matakuliah.update', $mata_kuliah->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
               <div class="card-body">
                  <div class="form-group">
                     <label for="nama">Nama Mata Kuliah</label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Mata Kuliah" value="{{ $mata_kuliah->nama }}">
                  </div>
                  
                  <div class="form-group">
                     <label for="nama">Status</label>
                     <select name="status" id="nama" class="form-control">
                        <option value="ACTIVE" {{ $mata_kuliah->status == "ACTIVE" ? ' selected' : '' }}>ACTIVE</option>
                        <option value="INACTIVE" {{ $mata_kuliah->status == "INACTIVE" ? ' selected' : '' }}>INACTIVE</option>
                     </select>
                  </div>
                  
                  <div class="form-group">
                     <input type="submit" value="Update" class="btn btn-success">
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
@endsection
