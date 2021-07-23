@extends('layouts.template')

@section('title', 'Riset Laravel Query Builder')

@section('content')
   <h2 class="text-center m-3">Laravel Query Builder</h2>

   <div class="row">
      <div class="col-md-6">
         <label>Filter Kelas: </label>
         <div>
            @foreach ($kelas as $item)
               <label>
                  <input type="checkbox" name="kelas" value="{{ $item }}"
                     @if (in_array($item, explode(",", request()->input('filter.kelas'))))
                        checked
                     @endif
                  >
                  {{ $item }}
               </label>
            @endforeach
            
            <button class="btn btn-sm btn-primary" id="filter">Filter</button>
            {{-- <button class="btn btn-sm btn-primary" id="cek">Cek</button> --}}
         </div>
      </div>
      <div class="col-md-6">
         <label>Sorting</label>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">1</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">2</label>
          </div>
      </div>
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
               {{-- {{ $mahasiswas->appends(Request::all())->links() }} --}}
            </td>
         </tr>
      </tfoot>
   </table>
@endsection

@push('js')
   <script>
      // Digunakan untuk mengambil ID dan kemudian di masukan ke dalam array
      function getIds(checkboxName) {
         let checkBoxes = document.getElementsByName(checkboxName);
         let ids = Array.prototype.slice.call(checkBoxes)
                        .filter(check => check.checked==true)
                        .map(check => check.value);
         
         return ids;
      }

      function filterResults () {
         let kelasIds = getIds("kelas");

         let href = 'laravel-query-builder?';

         if(kelasIds.length) {
            href += 'filter[kelas]=' + kelasIds ;
         }

         document.location.href=href;
      }

      document.getElementById('filter').addEventListener("click", filterResults)

      // document.getElementById('cek').addEventListener("click", function () {
      //    let checkBoxes = document.getElementsByName("kelas");
         
      //    cek = Array.prototype.slice.call(checkBoxes)
      //       .filter(c => c.checked == true)
      //       .map(c => c.value)
      //       .values()

      //    for (const value of cek) {
      //       console.log(value);
      //    }
      // });
   </script>
@endpush