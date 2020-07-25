@extends('layouts.template')

@section('title', 'Dummy Todo')

@section('content')
   <div class="row p-4">
      <div class="col-md-12 text-center">
         <h1>Dummy Todo</h1>
      </div>

      <a href="{{ route('welcome') }}" class="btn btn-warning mr-2">< Halaman Riset</a>
      <a href="{{ route('dummy.index', ['type' => 'add']) }}" class="btn btn-success">Tambah</a>
      <table class="table table-bordered table-hover mt-2">
         <thead>
            <tr class="text-center">
               <th width="10px">#</th>
               <th>Todo</th>
               <th width="150px">Status</th>
               <th width="150px">Tanggal Buat</th>
               <th width="200px">Aksi</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>1.</td>
               <td>
                  <p>
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, aspernatur?</td>
                  </p>
               <td class="text-center">
                  <label class="badge badge-success">SHOW</label>
               </td>
               <td class="text-center">
                  <label class="badge badge-success">18-8-2020</label>
               </td>
               <td class="text-center">
                  <div class="btn-group-sm">
                     <a href="{{ route('dummy.index', ['type' => 'edit', 'id' => 1]) }}" class="btn btn-primary">Edit</a>
                     <a href="{{ route('dummy.delete', ['id' => 1]) }}" class="btn btn-danger">Hapus</a>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
@endsection