@extends('layouts.template')

@section('title', 'Add Item Category')

@section('content')
   <h2 class="text-center m-3">Add Category <br> <b>[ {{ $item->name }} ]</b></h2>

   <a href="{{ route('test.toko.item.index') }}" class="btn btn-primary btn-sm mb-2 float-right">Back</a>
   <table class="table table-bordered table-hover table-striped">
      <thead>
         <tr>
            <th>#</th>
            <th width=60%>Name</th>
            <th width=30%>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($categories as $index => $category)
            <tr>
               <td>{{ ++$index }}. </td>
               <td>
                  {{ $category->name }}
               </td>
               <td>
                  @php
                     $status = false;
                  @endphp

                  @for ($i = 0; $i < $item->category->count(); $i++)
                     @if ($item->category[$i]->id == $category->id)
                        @php $status = true; @endphp
                     @endif
                  @endfor

                  @if ($status)
                     <a href="{{ route('test.toko.item.delete-item-category', ['id_item' => $item->id, 'id_category' => $category->id]) }}" class="btn btn-danger btn-sm">Hapus</a>
                  
                  @else
                     <form action="{{ route('test.toko.item.save-item-category', $item->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="id_category" value="{{ $category->id }}">

                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                     </form>
                  @endif
                  

               </td>
            </tr>
         @endforeach
         
         @if ($categories->isEmpty())
         <tr>
            <td colspan="4" align=center>
               Data Empty
            </td>
         </tr>
         @endif
      </tbody>
      <tfoot>
         <tr>
            <td colspan=4>
               {{-- {{ $mata_kuliah->appends(Request::all())->links() }} --}}
            </td>
         </tr>
      </tfoot>
   </table>
@endsection