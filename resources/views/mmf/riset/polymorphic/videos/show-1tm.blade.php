@extends('layouts.template')

@section('title', 'Show | Polymorphisme')

@section('content') 
   <div class="container">
      <div class="text-left">
         <a href="{{ route('test.poly.video.index') }}">Back to menu</a>
      </div>
      <div class="text-center mt-3">
         <h1>Polymorphisme</h1>
         <h5>( Video | Show )</h5>
      </div>
      <div class="card">
         <div class="card-body">

            <div class="row justify-content-center mt-3">
               <div class="col-md-3">
                  <label class="font-weight-bolder">Title</label>
                  <div>
                     {{ $video->title }}
                  </div>
               </div>
               <div class="col-md-6">
                  <label class="font-weight-bolder">Url</label>
                  <div>
                     {{ $video->url }}
                  </div>
               </div>
            </div>
            
            <div class="row justify-content-center mt-3">
               <div class="col-md-9">
                  <label class="font-weight-bolder">Komentar</label>
               </div>
            </div>
            <div class="row justify-content-center">
               <div class="col-md-9">
                  @if ($video->comments->count() == 0)
                  -
                  @else
                  <ul>
                     @foreach ($video->comments as $comment)
                     <li>
                        {{ $comment->body }} 
                        <a href="{{ route('test.poly.video.comment.delete', ['id' => $video->id, 'del' => $comment->id]) }}" > [ Hapus ]</a>
                     </li>
                     @endforeach
                  </ul>
                  @endif
                  
                  <form action="{{ route('test.poly.video.comment', $video->id) }}" method="post">
                     @csrf
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" name="comment" placeholder="Tambahkan Komentar">
                        <div class="input-group-append">
                           <button class="btn btn-outline-secondary" type="submit">Kirim</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      
   </div>
   @endsection