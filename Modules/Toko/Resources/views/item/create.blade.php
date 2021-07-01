@extends('layouts.template')

@section('title', 'Add Item')

@section('content')
   <h2 class="text-center m-3">Add Item</h2>
   <div class="row justify-content-center">
      <div class="col-md-6">
         <form action="{{ route('test.toko.item.store') }}" method="post">
            @csrf
            <div class="card">
               <div class="card-body">
                  <div class="form-group">
                     <label for="nama">Name</label>
                     <input type="text" name="name" id="name" class="form-control" placeholder="Item's name">
                  </div>

                  <div class="form-group">
                     <label for="price">Price</label>
                     <input type="text" name="price" id="price" class="form-control" placeholder="Item's Price">
                  </div>
                  
                  <div class="form-group">
                     <button type="submit" class="btn btn-success simpan">Save</button>
                     <a href="{{ route('test.toko.item.index') }}" class="btn btn-primary">Back</a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection