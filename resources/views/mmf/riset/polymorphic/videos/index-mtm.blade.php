@extends('layouts.template')

@section('title', 'Create Video | Polymorphisme')

@section('content')
   <div class="container">
      <div class="text-left">
         <a href="{{ route('test.poly.dashboard') }}">Back to menu</a>
      </div>
      
      <div class="text-center mt-3">
         <h1>Polymorphisme (Many to Many)</h1>
         <h5>( Video )</h5>
      </div>

      <div class="row mt-4 justify-content-center">
         <div class="col-md-8">
            <a href="{{ route('test.poly.video.create') }}" class="btn btn-success btn-sm float-right mb-1">Tambah Video</a>
            <table class="table table-bordered table-hover table-striped table-checkable " id="mahasiswa_table">
               <thead class="text-center">
                  <tr>
                     <th width=30%>Title</th>
                     <th width=30%>Url</th>
                     <th width=30%>Tag</th>
                     <th width=10%>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($videos as $video)
                     <tr>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->url }}</td>
                        <td class="text-center">
                           @if ($video->tags->count() == 0)
                              -
                           @else
                              @foreach ($video->tags as $tag)
                                 <label for="" class="badge badge-primary">{{ $tag->name }}</label>
                              @endforeach
                           @endif
                        </td>
                        <td>
                           <div class="btn-group-vertical">
                              {{-- Tombol ini digunakan untuk menampilkan form untuk menambahkan tags --}}
                              <a href="{{ route('test.poly.mtm.video.show', $video->id) }}" class="btn btn-sm btn-primary">Add Tags</a>
                              <a href="{{ route('test.poly.video.destroy', $video->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
                                 {{ $videos->appends(Request::all())->links() }}
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