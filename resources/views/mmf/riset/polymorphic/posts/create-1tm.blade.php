@extends('layouts.template')

@section('title', 'Riset Polymorphisme')

@section('content') 
<div class="container">
   <div class="text-left">
      <a href="{{ route('test.poly.post.index') }}">Back to menu</a>
   </div>
   <div class="text-center mt-3">
      <h1>Polymorphisme</h1>
      <h5>( Post | Create )</h5>
   </div>

   <div class="row justify-content-center mt-3">
      <div class="col-md-5">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('test.poly.post.store') }}" method="post">
                  @csrf
                  <div class="form-group">
                     <label for="title">Title</label>
                     <input type="text" name="title" id="title" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="body">Body</label>
                     <input type="text" name="body" id="body" class="form-control">
                  </div>
                  <input type="submit" class="btn btn-primary btn-block" value="Save">
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection