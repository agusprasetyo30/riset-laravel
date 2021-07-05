@extends('layouts.template')

@section('title', 'Edit Item')

@section('content')
   <h2 class="text-center m-3">Edit Item</h2>
   <div class="row justify-content-center">
      <div class="col-md-6">
         <form action="{{ route('test.toko.item.update', $item->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
               <div class="card-body">
                  <div class="form-group">
                     <label for="nama">Name</label>
                     <input type="text" name="name" id="name" class="form-control" placeholder="Item's name" value="{{ $item->name }}">
                  </div>

                  <div class="form-group">
                     <label for="price">Price</label>
                     <input type="text" name="price" id="price" class="form-control" placeholder="Item's Price" value="{{ $item->price }}">
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