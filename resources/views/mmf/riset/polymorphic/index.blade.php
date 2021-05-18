@extends('layouts.template')

@section('title', 'Riset Polymorphisme')

@push('css')
   <style>
      .font-20 {
         font-size: 20px;
      }

      .button-background {
         background: #007BFF;
         border-radius: 10px;
         color: white;
      }

      .button-background:hover {
         background: #91bff0;
         color: black;
         transition: 0.5s;
      }
   </style>
@endpush

@section('content')
<div class="container">
   <div class="text-left">
      <a href="{{ route('riset-memfis') }}">Back to menu</a>
   </div>
   
   <div class="text-center mt-3">
      <h1>Polymorphisme</h1>
      <small>Menerapkan metode <b>Polymorphisme</b> dalam mengembangkan sistem, selain menggunakan metode yang telah ada seperti eloquent relationship dll</small>
      <br>
      <small>-  <b>Post</b> dan <b>Video</b> Memiliki <b>Comment</b></small> (One to Many)
      <br>
      <small>- <b>Post</b>, <b>Video</b>, <b>Tags</b> yang dimana post dan Video memiliki tags dan tags bisa memiliki beberapa post dan video</small> (Many to many)

   </div>
   
   <div class="row">
      <div class="col-md-6">
         <div class="card mt-5">
            <div class="card-body">
               <div class="row justify-content-center">
                  <div class="col-md-12 text-center mt-2 mb-2">
                     <h4>One to Many</h4>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                        <a href="{{ route('test.poly.video.index') }}" class="text-decoration-none">
                           <div class="card-body text-center button-background">
                              <div class="p-3 font-weight-bolder font-20">Videos</div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                        <a href="{{ route('test.poly.post.index') }}" class="text-decoration-none">
                           <div class="card-body text-center button-background">
                              <div class="p-3 font-weight-bolder font-20">Posts</div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card mt-5">
            <div class="card-body">
               <div class="row justify-content-center">
                  <div class="col-md-12 text-center mt-2 mb-2">
                     <h4>Many to Many</h4>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                        <a href="#" class="text-decoration-none">
                           <div class="card-body text-center button-background">
                              <div class="p-3 font-weight-bolder font-20">Videos</div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                        <a href="#" class="text-decoration-none">
                           <div class="card-body text-center button-background">
                              <div class="p-3 font-weight-bolder font-20">Posts</div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                        <a href="{{ route('test.poly.tag.index') }}" class="text-decoration-none">
                           <div class="card-body text-center button-background">
                              <div class="p-3 font-weight-bolder font-20">Tags</div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   {{-- <div class="row mt-2 justify-content-center">
      <div class="col-md-5">
         <h4 class="text-center">Videos</h4>
         <table class="table table-bordered table-hover table-striped table-checkable " id="mahasiswa_table">
            <thead class="text-center">
               <tr>
                  <th width=30%>title</th>
                  <th width=70%>Url</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($videos as $video)
                  <tr>
                     <td>{{ $video->title }}</td>
                     <td>{{ $video->url }}</td>
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

      <div class="col-md-5">
         <h4 class="text-center">Post</h4>
         <table class="table table-bordered table-hover table-striped table-checkable " id="mahasiswa_table">
            <thead class="text-center">
               <tr>
                  <th width=30%>title</th>
                  <th width=70%>Url</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($posts as $post)
                  <tr>
                     <td>{{ $post->title }}</td>
                     <td>{{ $post->body }}</td>
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
   </div> --}}
</div>
@endsection