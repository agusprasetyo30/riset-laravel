@extends('layouts.template')

@section('title', 'Tambah Mata Kuliah')

@section('content')
   <h2 class="text-center m-3">Ambil Mata Kuliah</h2>
   <p class="text-center">[ {{ $mahasiswa->nama .' - '. $mahasiswa->kelas }} ]</p>

   <a href="{{ route('test.mahasiswa.index') }}" class="btn btn-primary btn-sm mb-2 float-right">Kembali</a>

   
   <table class="table table-bordered table-hover table-striped">
      <thead>
         <tr>
            <th>#</th>
            <th>Mata Kuliah</th>
            <th>Status</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @php $status = false; @endphp

         @foreach ($mata_kuliah as $index => $item)
            <tr>
               <td>{{ ++$index }}. </td>
               <td>{{ $item->nama }}</td>
               <td>
                  {{-- Cek Apakah sudah terdaftar atau belum --}}

                  @for ($i = 0; $i < $mahasiswa->mata_kuliah->count(); $i++)
                     @if ($mahasiswa->mata_kuliah[$i]->pivot->mata_kuliah_id == $item->id)
                        @php $status = true; @endphp

                     @endif
                  @endfor

                  {{-- Cek Status --}}
                  @if ($status)
                     <span class="badge badge-success">Sudah Diambil</span>
                     
                  @else
                     <span class="badge badge-primary">Belum Diambil</span>
                  @endif

               </td>
               <td>
                  @if ($status)
                     <a href="{{ route('test.mahasiswa.ambil-matkul.process', ['id' => $mahasiswa->id, 'matkul' => $item->id, 'type' => 'delete']) }}" class="btn btn-sm btn-danger">Batalkan</a>

                  @else
                     <a href="{{ route('test.mahasiswa.ambil-matkul.process', ['id' => $mahasiswa->id, 'matkul' => $item->id, 'type' => 'add']) }}" class="btn btn-sm btn-success">Ambil Matkul</a>
                  @endif
               </td>
               @php $status = false; @endphp

            </tr>
         @endforeach
      </tbody>
      <tfoot>
         <tr>
            <td colspan=4>
               {{ $mata_kuliah->appends(Request::all())->links() }}
            </td>
         </tr>
      </tfoot>
   </table>
@endsection