@extends('layouts.template')

@section('title', 'Riset Laravel Domp PDF')

@push('css')
   <style>
      .btn-background-blue {
         background: #007BFF;
         color: white;
      }

      .btn-background-blue:hover {
         background: #005ec2;
         transition: 0.3s all;
      }

      .btn-background-green {
         background: #1f9c49;
         color: white;
      }
   </style>
@endpush

@section('content')
<div class="container">
   <div class="text-center mt-3">
      <h1>Laravel Dompdf & iio/libmergepdf</h1>
      <small>Mengimplementasikan tampilan <b>PDF</b> dan <b>PRINT</b> PDF sesuai dengan tampilan/request dari perintah, 
         selain itu juga mengimplementasikan library untuk <b>merge/mengabungkan file PDF</b> <br>(merge antara Tampilan <b>Potrait</b> & <b>Landscape</b>)</small>
      <br>
      
      <div class="row justify-content-center mt-3">
         <div class="col-md-6">
            <p class="text-left font-weight-bold">Print Dompdf
               <br>
               <small>Untuk modul ini tidak perlu di download, akan tetapi di tampilkan PDF nya</small>
            </p>
            <div class="row">
               <div class="col-md-6">
                  <a href="{{ route('test.dompdf.print') }}" class="text-center text-decoration-none" target="_blank">
                     <div class="card">
                        <div class="card-body btn-background-blue">
                           Dompdf (All)
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-6">
                  <a href="{{ route('test.dompdf.dompdf-filter') }}" class="text-center text-decoration-none">
                     <div class="card">
                        <div class="card-body btn-background-blue">
                           Dompdf (Filter)
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <p class="text-left font-weight-bold">Print Dompdf & MergePDF 
               <br>
               <small>Untuk modul ini file PDF ternyata harus di download dan di tampilkan manual</small>
            </p>
            <div class="row">
               <div class="col-md-6">
                  <a href="{{ route('test.dompdf.merge-pdf') }}" class="text-center text-decoration-none">
                     <div class="card">
                        <div class="card-body btn-background-green">
                           Dompdf + MergePDF (All)
                        </div>
                     </div>
                  </a>

                  <a href="{{ asset('storage/combined.pdf') }}">Open the pdf! (test)</a>
               </div>
               <div class="col-md-6">
                  <a href="#" class="text-center text-decoration-none">
                     <div class="card">
                        <div class="card-body btn-background-green">
                           Dompdf + MergePDF (Filter)
                        </div>
                     </div>
                  </a>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection