@extends('layouts.template')

@section('title', 'Riset Laravel Domp PDF')

@section('content')
<div class="container">
   <div class="text-center mt-3">
      <h1>Laravel Dompdf & iio/libmergepdf</h1>
      <small>Mengimplementasikan tampilan <b>PDF</b> dan <b>PRINT</b> PDF sesuai dengan tampilan/request dari perintah, 
         selain itu juga mengimplementasikan library untuk <b>merge/mengabungkan file PDF</b> <br>(merge antara Tampilan <b>Potrait</b> & <b>Landscape</b>)</small>
      <br>
      
      <div class="row justify-content-center mt-3">
         <div class="col-md-3">
            <a href="{{ route('test.dompdf.print') }}" class="text-white text-center text-decoration-none">
               <div class="card">
                  <div class="card-body bg-primary">
                     Print Dompdf
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-3">

         </div>
      </div>
   </div>
</div>
@endsection