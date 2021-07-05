@extends('layouts.template')

@section('title', 'Item List')

@section('content')
   <h2 class="text-center m-3">Item</h2>

   <a href="{{ route('test.toko.item.create') }}" class="btn btn-primary btn-sm mb-2">Add Item</a>
   <a href="{{ route('test.toko.dashboard') }}" class="btn btn-primary btn-sm mb-2 float-right">Back</a>
   <table class="table table-bordered table-hover table-striped">
      <thead>
         <tr>
            <th>#</th>
            <th width=30%>Name</th>
            <th width=10%>Categories</th>
            <th width=30%>Price</th>
            <th width=30%>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($items as $index => $item)
            <tr>
               <td>{{ ++$index }}. </td>
               <td>
                  {{ $item->name }}
               </td>
               <td>
                  @foreach ($item->category as $category)
                     <span class="badge badge-success">{{ $category->name }}</span>
                  @endforeach

                  @if($item->category->isEmpty())
                     -
                  @endif
               </td>
               <td>
                  Rp. {{ number_format($item->price, 0, ',', '.')  }}
               </td>
               <td>
                  <a href="{{ route('test.toko.item.add-item-category-index', $item->id) }}" class="btn btn-sm btn-success">Add Category</a>
                  <a href="{{ route('test.toko.item.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  {{-- <a onclick="return confirm('Are you sure ?')" href="{{ route('test.toko.item.destroy', $item->id) }}" class="btn btn-danger btn-sm">Hapus</a> --}}
               </td>
            </tr>
         @endforeach
         
         @if ($items->isEmpty())
         <tr>
            <td colspan="4" align=center>
               Data Kosong
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