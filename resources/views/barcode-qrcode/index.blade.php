@extends('layouts.template')

@section('title', 'Barcode & QRCode')

@section('content')
   <a href="{{ route('welcome') }}">< Back</a>

   <table class="table table-bordered table-hover mt-2">
      <thead>
         <tr class="text-center">
            <th width="10px">#</th>
            <th>Todo</th>
            <th width="150px">Barcode</th>
            <th width="150px">QRcode</th>
            <th width="150px">Status</th>
            <th width="150px">Tanggal Buat</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($todo_data as $no => $todo)""
               <tr>
                  <td>{{ ++$no }}. </td>
                  <td>
                     <p>
                        {{ $todo->todo }}
                     </p>
                  </td>
                  <td class="text-center">
                  </td>
                  <td class="text-center">
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

   {{-- <div class="barcode" style="font-size: 50px">
      <p class="name">{{$todo->todo}}</p>
      <p class="name">{{$todo->id}}</p>
      {!! DNS1D::getBarcodeHTML( (string)$todo->id , "C128", 3, 70, 'black', true) !!}
      <br>
      {!! DNS2D::getBarcodeHTML( (string)$todo->id , "QRCODE", 4, 4) !!} --}}
      {{-- <p class="pid">{{$product->pid}}</p> --}}
   {{-- </div> --}}
@endsection