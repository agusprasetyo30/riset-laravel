@extends('layouts.template')

@section('title', 'Show Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Show Mata Kuliah</h2>

   <div class="row justify-content-center">
      <div class="col-md-7">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="nama">Nama Mata Kuliah</label>
                        <h5 class="font-weight-bold">{{ $mata_kuliah->nama }}</h5>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="nama">Status</label>
                        <h5 class="font-weight-bold">{{ $mata_kuliah->status }}</h5>
                     </div>
                  </div>
               </div>

               <a href="{{ route('test.matakuliah.index') }}" class="btn btn-sm btn-primary float-right mb-2">Kembali</a>
               
               <table class="table table-bordered table-hover table-striped">
                  <thead>
                     <tr align=center>
                        <th width=10%>#</th>
                        <th width=65%>Nama Mahasiswa</th>
                        <th width=25%>Kelas</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($mata_kuliah->ambilMahasiswa as $i => $mahasiswa)
                        <tr>
                           <td>{{ ++$i }}</td>
                           <td>{{ $mahasiswa->nama }}</td>
                           <td>{{ $mahasiswa->kelas }}</td>
                        </tr>
                     @endforeach

                     @if ($mata_kuliah->ambilMahasiswa->isEmpty())
                        <tr align=center>
                           <td colspan="3">Data Kosong</td>
                        </tr>
                     @endif
                  </tbody>
                  <tfoot>
                     <tr>
                        <td colspan=3>
                           {{ $mata_kuliah->ambilMahasiswa->appends(Request::all())->links() }}
                        </td>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection
