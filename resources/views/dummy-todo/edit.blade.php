@extends('layouts.template')

@section('title', 'Dummy Todo Add')

@section('content')
   <div class="row p-4 justify-content-center">
      <div class="col-md-12 text-center">
         <h1>Dummy Todo Edit</h1>
      </div>

      <div class="col-md-6 mt-3">
         <div class="card card-default">
            <form action="{{ route('dummy.update', Request::get('id')) }}" method="post">
               @csrf
               @method('put')
               <div class="card-body">
                  <div class="form-group">
                     <label for="todo">Todo</label>
                     <textarea name="todo" id="todo" rows="3" class="form-control">{{ $todo_edit->todo }}</textarea>
                  </div>

                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" id="status" class="form-control">
                        <option value="SHOW" {{ $todo_edit->status == 'SHOW' ? ' selected' : '' }}>SHOW</option>
                        <option value="HIDE" {{ $todo_edit->status == 'HIDE' ? ' selected' : '' }}>HIDE</option>
                     </select>
                  </div>

                  <input type="submit" value="Update" class="btn btn-primary btn-block mt-2">
                  <a href="{{ route('dummy.index') }}" class="btn btn-warning btn-block">Kembali</a>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection