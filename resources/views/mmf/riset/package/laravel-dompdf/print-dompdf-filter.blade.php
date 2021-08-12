@extends('layouts.template')

@section('title', 'Riset Laravel Domp PDF')

@section('content')
<div class="container">
   <div class="text-center mt-3">
      <h1>Laravel Dompdf & iio/libmergepdf (Dengan Filter)</h1>
      <small>Mengimplementasikan tampilan <b>PDF</b> dan <b>PRINT</b> PDF sesuai dengan tampilan/request dari perintah, 
         selain itu juga mengimplementasikan library untuk <b>merge/mengabungkan file PDF</b> <br>(merge antara Tampilan <b>Potrait</b> & <b>Landscape</b>)</small>
      <br>
   </div>

   <div class="form-row justify-content-center mt-3">
      <div class="col-md-4">
         <div class="card">
            <div class="card-body bg-primary">
               {{-- <p class="text-left font-weight-bold">Filter</p> --}}
               <label for="kelas" class="text-white">Kelas</label>
               <select name="kelas" id="kelas" class="form-control">
                  <option value="MI-3A">MI-3A</option>
                  <option value="MI-3B">MI-3B</option>
                  <option value="MI-3C">MI-3C</option>
                  <option value="MI-3D">MI-3D</option>
                  <option value="MI-3E">MI-3E</option>
                  <option value="MI-3F">MI-3F</option>
               </select>

               <button type="submit" class="btn btn-success mt-2">Cari</button>
            </div>
         </div>
      </div>
   {{-- </div>

   <div class="form-row justify-content-center mt-3"> --}}
      <div class="col-md-4">
         <div class="card">
            <div class="card-body bg-primary">
            {{-- <p class="text-left font-weight-bold">Filter</p> --}}
               <label for="mahasiswa" class="text-white">Mahasiswa</label>
               <select name="mahasiswa" id="mahasiswa" class="form-control">
                  @foreach ($mahasiswa as $item)
                     <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                  @endforeach
               </select>

               <button type="submit" class="btn btn-success mt-2">Cari</button>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection