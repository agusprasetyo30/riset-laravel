@extends('layouts.template')

@section('title', 'Create Post | Polymorphisme')

@section('content')
<div class="container">
   <div class="text-left">
      <a href="{{ route('test.poly.dashboard') }}">Back to menu</a>
   </div>
   
   <div class="text-center mt-3">
      <h1>Polymorphisme (Many to Many)</h1>
      <h5>( Post )</h5>
   </div>

   <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
         <a href="{{ route('test.poly.post.create') }}" class="btn btn-success btn-sm float-right mb-1">Tambah Post</a>
         <table class="table table-bordered table-hover table-striped table-checkable " id="mahasiswa_table">
            <thead class="text-center">
               <tr>
                  <th width=30%>Title</th>
                  <th width=40%>Body</th>
                  <th width=20%>Tag</th>
                  <th width=10%>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($posts as $post)
                  <tr>
                     <td>{{ $post->title }}</td>
                     <td>{{ $post->body }}</td>
                     <td class="text-center">
                        @if ($post->tags->count() == 0)
                              -
                        @else
                           @foreach ($post->tags as $tag)
                              <label class="badge badge-primary">{{ $tag->name }}</label>
                           @endforeach
                        @endif
                     </td>
                     <td>
                        <div class="btn-group-vertical">
                           <a href="{{ route('test.poly.mtm.post.show', $post->id) }}" class="btn btn-sm btn-primary">Add Tags</a>
                           <a href="{{ route('test.poly.post.destroy', $post->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </div>
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