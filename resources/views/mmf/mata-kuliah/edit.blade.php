@extends('layouts.template')

@section('title', 'Edit Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Edit Mata Kuliah</h2>

   <div class="row justify-content-center">
      <div class="col-md-6">
         <form name="formMataKuliahEdit">
            <div class="card">
               <div class="card-body">
                  <div class="form-group">
                     <label for="nama">Nama Mata Kuliah</label>
                     <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Mata Kuliah" value="{{ $mata_kuliah->nama }}">
                     <small id="nama-error" class="text-danger"></small>
                  </div>
                  
                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" id="status" class="form-control">
                        <option value="ACTIVE" {{ $mata_kuliah->status == "ACTIVE" ? ' selected' : '' }}>ACTIVE</option>
                        <option value="INACTIVE" {{ $mata_kuliah->status == "INACTIVE" ? ' selected' : '' }}>INACTIVE</option>
                     </select>
                  </div>
                  
                  <input type="hidden" name="matkul_uuid" value="{{ $mata_kuliah->uuid }}">
                  <div class="form-group">
                     <button type="button" class="btn btn-success update">Update</button>
                     <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
@endsection

@push('js')
   <script src="{{ asset('js/frontend/mata-kuliah/edit.js') }}"></script>
@endpush