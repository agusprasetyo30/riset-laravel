@extends('layouts.template')

@section('title', 'Add Category')

@section('content')
   <h2 class="text-center m-3">Add Category</h2>
   <div class="row justify-content-center">
      <div class="col-md-6">
         <form action="{{ route('test.toko.category.store') }}" method="post">
            @csrf
            <div class="card">
               <div class="card-body">
                  <div class="form-group">
                     <label for="nama">Name</label>
                     <input type="text" name="name" id="name" class="form-control" placeholder="Category's name">
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