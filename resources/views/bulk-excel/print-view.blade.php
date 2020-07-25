@extends('layouts.template')

@section('title', 'Bulk Excel View')

@section('content')
   <table class="table table-bordered table-hover mt-2">
      <thead>
         <tr class="text-center">
            <th width="10px">#</th>
            <th>Todo</th>
            <th width="150px">Status</th>
            <th width="150px">Tanggal Buat</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($todo_data as $no => $todo)
            <tr>
               <td>{{ ++$no }}. </td>
               <td>
                  <p>
                     {{ $todo->todo }}
                  </p>
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