@extends('layouts.template')

@section('title', 'Riset Polymorphisme')

@section('content') 
<div class="container">
   <div class="text-left">
      <a href="{{ route('test.poly.tag.index') }}">Back to menu</a>
   </div>
   <div class="text-center mt-3">
      <h1>Polymorphisme</h1>
      <h5>( Tags | Create )</h5>
   </div>

   <div class="row justify-content-center mt-3">
      <div class="col-md-5">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('test.poly.tag.store') }}" method="post">
                  @csrf
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" name="name" id="name" class="form-control">
                  </div>
                  <input type="submit" class="btn btn-primary btn-block" value="Save">
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection