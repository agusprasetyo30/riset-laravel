@extends('layouts.template')

@section('title', 'Riset Polymorphisme')

@section('content')
<div class="container">
   <div class="text-left">
      <a href="{{ route('test.index') }}">Back to menu</a>
   </div>
   
   <div class="text-center mt-3">
      <h1>Polymorphisme</h1>
      <small>Menerapkan metode <b>Polymorphisme</b> dalam mengembangkan sistem, selain menggunakan metode yang telah ada seperti eloquent relationship dll</small>
      <br>
      <small>Contoh dalam kasus ini adalah <b>Post</b> dan <b>Video</b> Memiliki <b>Comment</b></small>
   </div>
   
   <div class="row mt-2">
      <div class="col-md-10">
         <table class="table table-bordered table-hover table-striped table-checkable " id="mahasiswa_table">
            <thead class="text-center">
               <tr>
                  <th width=30%>Nama</th>
                  <th width=20%>Kelas</th>
                  <th width=20%>Jumlah Matkul</th>
               </tr>
            </thead>
            <tbody>
               {{-- @foreach ($mahasiswas as $mahasiswa)
                  <tr>
                     <td>{{ $mahasiswa->nama }}</td>
                     <td>{{ $mahasiswa->kelas }}</td>
                     <td>{{ $mahasiswa->mata_kuliah->count() }}</td>
                  </tr>
               @endforeach --}}
            </tbody>
            <tfoot >
               <tr>
                  <td colspan="3">
                     <div class="row text-center">
                        <div class="col-md-12 ">
                              {{-- {{ $mahasiswas->appends(Request::all())->links() }} --}}
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