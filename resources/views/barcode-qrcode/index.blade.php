@extends('layouts.template')

@section('title', 'Barcode & QRCode')

@section('include-modal')
   @include('modals.barcode')
   @include('modals.qrcode')
@endsection

@section('content')
   <a href="{{ route('welcome') }}">< Back</a>
   <h2></h2>
   <table class="table table-bordered table-hover mt-2">
      <thead>
         <tr class="text-center">
            <th width="10px">#</th>
            <th>ID Todo String</th>
            <th>Todo</th>
            <th width="150px">Barcode</th>
            <th width="150px">QRcode</th>
            <th width="150px">Status</th>
            <th width="150px">Tanggal Buat</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($todo_data as $no => $todo)
               <tr>
                  <td>{{ ++$no }}. </td>
                  <td>
                     {{ $todo->todo_id_string }}
                  </td>
                  <td>
                     <p>
                        {{ $todo->todo }}
                     </p>
                  </td>
                  <td class="text-center">
                     <button class="btn btn-primary" onclick="event.preventDefault(); showBarcode('{{ $todo->todo_id_string }}');" id="show-barcode">Show Barcode</button>
                     {{-- {!! DNS1D::getBarcodeHTML( $todo->todo_id_string , "C128", 3, 70, 'black', true) !!} --}}
                  </td>
                  <td class="text-center">
                     <button class="btn btn-success" id="show-qrcode">Show QRcode</button>
                     {{-- {!! DNS2D::getBarcodeHTML( $todo->todo_id_string, "QRCODE", 4, 4) !!} --}}
                  </td>
                  <td class="text-center">
                     <label class="badge {{ $todo->status == 'SHOW' ? 'badge-success' : 'badge-danger' }}">{{ $todo->status }}</label>
                  </td>
                  <td class="text-center">
                     <label class="badge badge-success">
                        {{ date('d-M-Y H:i:s', strtotime($todo->created_at)) }}
                     </label>
                  </td>
               </tr>
            @endforeach
      </tbody>
   </table>
@endsection

@push('js')
   <script>
      // Menampilkan modal untuk menambahkan stock
      function showBarcode(todo_id_string)
      {
         $(document).ready(function() {
               $('.modal-header #modalHeading').html("Tambah stok barang")
               $("#coba").html(`{!! DNS1D::getBarcodeHTML("`+ todo_id_string + `" , "C128", 1.7, 70, "black", true) !!}`);
               
               $('#barcodeModal').modal('show')
         });
      };

      // Ketika tombol close atau [ X ] pada modal item stock add ditekan
      $('#closeBarcodeModal').click(function() {
         $("#barcodeModal").trigger("reset");
      });
   </script>
@endpush