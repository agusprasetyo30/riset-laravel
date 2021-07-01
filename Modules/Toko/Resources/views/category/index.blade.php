@extends('layouts.template')

@section('title', 'Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Category</h2>

   <a href="{{ route('test.toko.category.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Category</a>
   <a href="{{ route('test.toko.dashboard') }}" class="btn btn-primary btn-sm mb-2 float-right">Kembali</a>
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
                  <a href="{{ route('test.toko.category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <a onclick="return confirm('Are you sure ?')" href="{{ route('test.toko.category.destroy', $category->id) }}" class="btn btn-danger btn-sm">Hapus</a>
               </td>
            </tr>
         @endforeach
         
         @if ($categories->isEmpty())
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