@extends('layouts.template')

@section('title', 'Create Post | Polymorphisme')

@section('content')
<div class="container">
   <div class="text-left">
      <a href="{{ route('test.poly.dashboard') }}">Back to menu</a>
   </div>
   
   <div class="text-center mt-3">
      <h1>Polymorphisme</h1>
      <h5>( Post )</h5>
   </div>

   <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
         <a href="{{ route('test.poly.post.create') }}" class="btn btn-success btn-sm float-right mb-1">Tambah Post</a>
         <table class="table table-bordered table-hover table-striped table-checkable " id="mahasiswa_table">
            <thead class="text-center">
               <tr>
                  <th width=30%>Title</th>
                  <th width=60%>Url</th>
                  <th width=10%>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($posts as $post)
                  <tr>
                     <td>{{ $post->title }}</td>
                     <td>{{ $post->body }}</td>
                     <td>
                        <form action="{{ route('test.poly.post.destroy', $post->id) }}" method="post">
                           @csrf
                           @method('delete')
                           <a href="{{ route('test.poly.post.show', $post->id) }}" class="btn btn-sm btn-primary">Comment</a>

                        </form>
                     </td>
                  </tr>
               @endforeach
            </tbody>
            <tfoot >
               <tr>
                  <td colspan="3"> 
                     <div class="row text-center">
                        <div class="col-md-12 ">
                              {{ $posts->appends(Request::all())->links() }}
                        </div>
                     </div>
                  </td>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>
@endsection