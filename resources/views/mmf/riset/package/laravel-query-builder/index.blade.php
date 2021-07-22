@extends('layouts.template')

@section('title', 'Riset Laravel Query Builder')

@section('content')
   <h2 class="text-center m-3">Laravel Query Builder</h2>

   <label>Filter Kelas</label>
   <div>
      <label>
         <input type="checkbox" name="kelas" value="MI-3A">
         MI-3A
      </label>
      <label>
         <input type="checkbox" name="kelas" value="MI-3B">
         MI-3B
      </label>
      <label>
         <input type="checkbox" name="kelas" value="MI-3C">
         MI-3C
      </label>
      <label>
         <input type="checkbox" name="kelas" value="MI-3D">
         MI-3D
      </label>
      <label>
         <input type="checkbox" name="kelas" value="MI-3E">
         MI-3E
      </label>
      <label>
      <input type="checkbox" name="kelas" value="MI-3F">
         MI-3F
      </label>
      <button class="btn btn-sm btn-primary" id="filter">Filter</button>
   </div>

   {{-- {{ print_r(explode(",", request()->input('filter.name'))) }} --}}

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
         @foreach ($mahasiswas as $mahasiswa)
            <tr>
               <td>{{ $numberPagination++ }}. </td>
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
               {{ $mahasiswas->appends(Request::all())->links() }}
            </td>
         </tr>
      </tfoot>
   </table>
@endsection

@push('js')
   <script>
      function getIds(checkboxName) {
         let checkBoxes = document.getElementsByName(checkboxName);
         let ids = Array.prototype.slice.call(checkBoxes)
                        .filter(check => check.checked==true)
                        .map(check => check.value);
         return ids;
      }

      function filterResults () {
         let kelasIds = getIds("kelas");


         // console.log(kelasIds);
         // let catagoryIds = getIds("catagory");

         let href = 'laravel-query-builder?';

         if(kelasIds.length) {
            href += 'filter[kelas]=' + kelasIds ;
         }

         // if(catagoryIds.length) {
         //    href += '&filter[category]=' + catagoryIds;
         // }

         document.location.href=href;
      }

      document.getElementById('filter').addEventListener("click", filterResults)

   </script>
@endpush