@extends('layouts.template')

@section('title', 'Riset Laravel Query Builder')

@section('content')
   <div class="text-center m-4">
      <h2>Laravel Query Builder</h2>
      <small>Pada halaman ini mengimplemtasikan <b>Laravel Query Builder</b> untuk melakukan <b>Filter</b> dan <b>Sorting</b> data mahasiswa</small>
   </div>

   <div class="row">
      <div class="col-md-6">
         <h5>Filter Kelas</h5>
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
      <div class="col-md-4">
         <h5>Sorting</h5>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipe_sorting" id="kelas" value="kelas">
            <label class="form-check-label" for="kelas">Kelas</label>
         </div>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipe_sorting" id="nama" value="nama">
            <label class="form-check-label" for="nama">Nama</label>
         </div>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipe_sorting" id="jk" value="jk">
            <label class="form-check-label" for="jk">Jenis Kelamin</label>
         </div>
      </div>
      <div class="col-md-2">
         <h5>Order By</h5>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="order_type" id="asc" value="ASC" checked>
            <label class="form-check-label" for="asc">ASC</label>
         </div>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="order_type" id="desc" value="DESC">
            <label class="form-check-label" for="desc">DESC</label>
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
      let href = 'laravel-query-builder?';

      //Untuk filter berdasarkan kelas

      // Digunakan untuk mengambil ID dan kemudian di masukan ke dalam array
      function getIds(checkboxName) 
      {
         let checkBoxes = document.getElementsByName(checkboxName);
         let ids = Array.prototype.slice.call(checkBoxes)
            .filter(check => check.checked==true)
            .map(check => check.value);
         
         return ids;
      }

      function filterResults () 
      {
         let kelasIds = getIds("kelas");
         let href = 'laravel-query-builder?';

         if(kelasIds.length) {
            href += 'filter[kelas]=' + kelasIds ;
         }

         document.location.href=href;
      }

      document.getElementById('filter').addEventListener("click", filterResults)


      // Sorting berdasarkan data yang dipilih

      // 
      function getValueChecked(input_radio_name, query_string_name)
      {
         tipe_sorting = getRadioButtonValue(input_radio_name)
         var urlParams = new URLSearchParams(window.location.search)

         for (let i = 0; i < tipe_sorting.length; i++) {
            if (urlParams.get(query_string_name) == tipe_sorting[i] || urlParams.get(query_string_name) == "-" + tipe_sorting[i]) {
               $("#" + tipe_sorting[i]).prop("checked", true)

               return tipe_sorting[i]
               break
            }
         }
      }

      //
      function sortOrderChecked(order_name)
      {
         let order_type_check = getRadioButtonValue(order_name)
         let check_query_string_sort = new URLSearchParams(window.location.search)
         
         for (let i = 0; i < order_type_check.length; i++) {
            if (check_query_string_sort.get('sort')[0] == "-") { // mengambil satu huruf di depan untuk mengidentifikasi tanda "-"
               $("#desc").prop("checked", true)
            } else {
               $("#asc").prop("checked", true)
            }
         }
      }

      // 
      function getRadioButtonValue(radioName) 
      {
         let getInputRadio = document.querySelectorAll('input[name="' + radioName +  '"]')
         let value = Array.prototype.slice.call(getInputRadio)
            .map(check => check.value);
         
         return value;
      }

      //
      let tipe_sorting = document.querySelectorAll('input[name="tipe_sorting"]');
      let getFilter = getIds('kelas');

      for (let i = 0; i < tipe_sorting.length; i++) {

         tipe_sorting[i].addEventListener("change", function() {
            href += "sort=" + this.value; // this == the clicked radio,
            
            // Cek apakah ada filter apa belum
            if (getFilter.length > 0) {
               href += "&filter[kelas]=" + getFilter
            }

            document.location.href = href;
         });
      }
      
      getRadioButtonValue('tipe_sorting')
      getValueChecked('tipe_sorting', 'sort')
      sortOrderChecked('order_type')
      
      let order_type = document.querySelectorAll('input[name="order_type"]');
      for (let i = 0; i < order_type.length; i++) {
         order_type[i].addEventListener("change", function() {
            if (this.value == "DESC") {
               href += "sort=-" + getValueChecked('tipe_sorting', 'sort')
            } else {
               href += "sort=" + getValueChecked('tipe_sorting', 'sort')
            }

            if (getFilter.length > 0) {
               href += "&filter[kelas]=" + getFilter
            }

            document.location.href = href;
         });
      }



   </script>
@endpush