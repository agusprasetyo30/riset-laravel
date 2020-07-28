@extends('layouts.template')

@section('title', 'Bulk Excel View')

@section('content')
   <a href="{{ route('excel.index') }}">< Back</a>

   <h1 class="text-center">Import Data Excel</h1>

   <div class="row justify-content-center" style="padding-top: 30px">
      <div class="col-md-6">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('excel.print.import') }}" method="post" enctype="multipart/form-data">
                  @csrf

                  @if (session('success'))
                     <div class="alert alert-success">
                        {{ session('success') }}
                     </div>
                  @endif

                  @if (session('error'))
                     <div class="alert alert-success">
                        {{ session('error') }}
                     </div>
                  @endif

                  <div class="form-group">
                     <label for="">File (.xls, .xlsx)</label>
                     <input type="file" class="form-control h-auto" name="file">
                     <p class="text-danger">{{ $errors->first('file') }}</p>
                  </div>
                  
                  <div class="form-group">
                     <button class="btn btn-primary btn-sm" type="submit">Upload</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection