@extends('layouts.template')

@section('title', 'Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Add Category <br> <b>[ {{ $item->name }} ]</b></h2>

   <a href="{{ route('test.toko.dashboard') }}" class="btn btn-primary btn-sm mb-2 float-right">Back</a>
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
                  <form action="{{ route('test.toko.item.save-item-category', $item->id) }}" method="post">
                     @csrf
                     <input type="hidden" name="id_category" value="{{ $category->id }}">

                     <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                     <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                  </form>

                  {{-- <form action="" method="post"> --}}
                  {{-- </form> --}}
                  {{-- <a onclick="return confirm('Are you sure ?')" href="{{ route('test.toko.category.destroy', $category->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
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