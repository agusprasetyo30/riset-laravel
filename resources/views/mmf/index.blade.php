@extends('layouts.template')

@section('title', 'Test MMF')

@section('content')
   <div class="m-3">
      <h2 class="text-center">Test PT. MMF</h2>
      <h4 class="text-center">Mahasiswa Mengambil Mata Kuliah</h4>

      <div class="mb-2">
         <a href="{{ route('test.mahasiswa.index') }}" class="btn btn-primary btn-sm">Mahasiswa</a>
         <a href="{{ route('test.matakuliah.index') }}" class="btn btn-primary btn-sm">Mata Kuliah</a>
      </div>
      <table class="table table-bordered table-hover table-striped">
         <thead>
            <tr>
               <th>#</th>
               <th>Nama Mahasiswa</th>
               <th>Alamat</th>
               <th>Mata Kuliah Diambil</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>1.</td>
               <td>Melkan</td>
               <td>Ds. Sumurgung</td>
               <td>
                  <span class="badge badge-success">asa</span>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
@endsection