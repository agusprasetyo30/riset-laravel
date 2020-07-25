@extends('layouts.template')

@section('title', 'Dummy Todo Add')

@section('content')
   <div class="row p-4 justify-content-center">
      <div class="col-md-12 text-center">
         <h1>Dummy Todo Add</h1>
      </div>
      
      <div class="col-md-6 mt-3">
         <div class="card card-default">
            <form action="{{ route('dummy.store') }}" method="post">
               @csrf
               <div class="card-body">
                  <label for="todo">Todo</label>
                  <textarea name="todo" id="todo" rows="3" class="form-control"></textarea>
                  
                  <input type="submit" value="Simpan" class="btn btn-success btn-block mt-2">
                  <a href="{{ route('dummy.index') }}" class="btn btn-warning btn-block">Kembali</a>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection