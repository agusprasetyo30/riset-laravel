@extends('layouts.template')

@section('title', 'Create Tags | Polymorphisme')

@section('content')
   <div class="container">
      <div class="text-left">
         <a href="{{ route('test.poly.dashboard') }}">Back to menu</a>
      </div>
      
      <div class="text-center mt-3">
         <h1>Polymorphisme</h1>
         <h5>( Tags )</h5>
      </div>

      <div class="row mt-4 justify-content-center">
         <div class="col-md-8">
            <a href="{{ route('test.poly.tag.create') }}" class="btn btn-success btn-sm float-right mb-1">Tambah Tags</a>
            <table class="table table-bordered table-hover table-striped table-checkable " id="mahasiswa_table">
               <thead class="text-center">
                  <tr>
                     <th width=80%>Name</th>
                     <th width=20%>Action</th>
                  </tr>
               </thead>
               <tbody class="text-center">
                  @foreach ($tags as $tag)
                     <tr>
                        <td>{{ $tag->name }}</td>
                        <td>
                           <div class="btn-group-vertical">
                              <a href="{{ route('test.poly.tag.show', $tag->id) }}" class="btn btn-sm btn-primary">Comment</a>
                              <a href="{{ route('test.poly.tag.destroy', $tag->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
                                 {{ $tags->appends(Request::all())->links() }}
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