@extends('layouts.template')

@section('title', 'Riset Laravel Sortable')

@section('content')
<table class="table table-bordered table-hover table-striped table-checkable mt-5" id="mahasiswa_table">
   <thead class="text-center">
      <tr>
         <th width=60%>Nama</th>
         <th width=20%>Kelas</th>
         <th width=20%>Jenis Kelamin</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($mahasiswas as $mahasiswa)
         <tr>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->kelas }}</td>
            <td>{{ $mahasiswa->jk }}</td>
         </tr>
      @endforeach
   </tbody>
   <tfoot >
      <tr>
         <td colspan="3"> 
            <div class="row text-center">
               <div class="col-md-12 ">
                  {{ $mahasiswas->appends(Request::all())->links() }}
               </div>
            </div>
         </td>
      </tr>
   </tfoot>
</table>
@endsection