@extends('layouts.template')

@section('title', 'Show | Polymorphisme')

@section('content') 
   <div class="container">
      <div class="text-left">
         <a href="{{ route('test.poly.mtm.video.index') }}">Back to menu</a>
      </div>
      <div class="text-center mt-3">
         <h1>Polymorphisme (Many to Many)</h1>
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
                  <label class="font-weight-bolder">Tags</label>
               </div>
            </div>
            <div class="row justify-content-center">
               <div class="col-md-9">
                  @if ($video->tags->count() == 0)
                  -
                  @else
                  <ul>
                     @foreach ($video->tags as $tag)
                        <li>
                           {{ $tag->name }}
                           {{-- <a href="{{ route('test.poly.post.comment.delete', $comment->id) }}" > [ Hapus ]</a> --}}
                           <a href="{{ route('test.poly.mtm.video.delete.tag', ['id' => $video->id , 'del' => $tag->id]) }}"> [ Hapus ]</a>
                        </li>
                     @endforeach
                  </ul>
                  @endif
                  
                  <form action="{{ route('test.poly.mtm.video.add.tag', $video->id) }}" method="post">
                     @csrf
                        <label for="tag">Pilih Tag</label>
                        <select name="tag" id="tag" class="form-control" style="cursor: pointer">
                           @php
                              $disabled = false;
                           @endphp
                           @foreach ($tags as $tag)
                              @foreach ($video->tags as $videoTag)
                                 @if ($videoTag->name == $tag->name)
                                    @php
                                       $disabled = true;
                                    @endphp
                                    @break
                                 @else
                                    @php
                                       $disabled = false;
                                    @endphp
                                 @endif
                              @endforeach

                              @if ($disabled)
                                 <option value="{{ $tag->id }}" disabled>{{ $tag->name }}</option>
                              @else
                                 <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                              @endif
                           @endforeach
                        </select>
                        <button class="btn btn-outline-success mt-2" type="submit">Kirim</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      
   </div>
   @endsection