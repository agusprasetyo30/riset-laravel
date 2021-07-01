@extends('layouts.template')

@section('title', 'Edit Category')

@section('content')
   <h2 class="text-center m-3">Edit Category</h2>
   <div class="row justify-content-center">
      <div class="col-md-6">
         <form action="{{ route('test.toko.category.update', $category->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
               <div class="card-body">
                  <div class="form-group">
                     <label for="nama">Name</label>
                     <input type="text" name="name" id="name" class="form-control" 
                        placeholder="Category's name" value="{{ $category->name }}">
                     <small id="nama-error" class="text-danger"></small>
                  </div>
                  
                  <div class="form-group">
                     <button type="submit" class="btn btn-success simpan">Simpan</button>
                     <a href="{{ route('test.toko.category.index') }}" class="btn btn-primary">Kembali</a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection