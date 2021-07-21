@extends('layouts.template')

@section('title', 'Riset Laravel Query Builder')

@section('content')
   <h2 class="text-center m-3">Laravel Query Builder</h2>

   <label>Filter Kelas</label>
   <div>
      <label>
         <input type="checkbox" name="" id="">
         MI-3A
      </label>
      <label>
         <input type="checkbox" name="" id="">
         MI-3B
      </label>
      <label>
         <input type="checkbox" name="" id="">
         MI-3C
      </label>
      <label>
         <input type="checkbox" name="" id="">
         MI-3D
      </label>
      <label>
         <input type="checkbox" name="" id="">
         MI-3E
      </label>
      <label>
      <input type="checkbox" name="" id="">
         MI-3F
      </label>
      <button class="btn btn-sm btn-primary">Filter</button>
   </div>

   {{-- {{ request()->input('filter.name') }} --}}

   <table class="table table-bordered table-hover table-striped">
      <thead>
         <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>JK</th>
            <th>Alamat</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($mahasiswas as $index => $mahasiswa)
            <tr>
               <td>{{ ++$index }}. </td>
               <td>
                  <a href="{{ route('test.mahasiswa.show', $mahasiswa->uuid) }}">{{ $mahasiswa->nama }}</a>
               </td>
               <td>{{ $mahasiswa->kelas }}</td>
               <td>{{ $mahasiswa->jk }}</td>
               <td>{{ $mahasiswa->alamat }}</td>
         </tr>
         @endforeach
      </tbody>
      <tfoot>
         <tr>
            <td colspan="6">
               {{-- {{ $mahasiswas->appends(Request::all())->links() }} --}}
            </td>
         </tr>
      </tfoot>
   </table>
@endsection