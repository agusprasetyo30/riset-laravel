<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   {{-- <link rel="stylesheet" href="{{ asset('vendors/bootstrap-4.5.3/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}"> --}}
   
   {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}
   <title>Print dompdf</title>
   <style>
      @page {
         margin: 0cm 0cm;
      }
      
      header {
         position: fixed;
         top: 0cm;
         left: 0cm;
         right: 0cm;
         height: 3cm;
      }

      footer {
         position: fixed;
         bottom: 0cm;
         left: 0cm;
         right: 0cm;
         height: 1cm;
      }

      html,
      body {
         padding: 0;
         margin: 0;
         font-size: 15px;
      }
      body{
         font-family: Arial, Helvetica, sans-serif;
         /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
         /* margin-top: 4.6cm;
         margin-bottom: 1.2cm; */
      }
      
      ul {
         /* display: inline-block; */
         width: 70%;
         margin: auto;
         text-align: left;
      }

      table {
         border-collapse: collapse;
         border: 1px solid black;
      }

      table td,th {
         border: 1px solid black;
      }

      .page-break {
         page-break-after: always;
      }
   </style>
</head>
<body>
   <div class="container mt-3">
      <div class="row justify-content-center">
         <div class="col-md-10">
            <h2 style="text-align: center">MAHASISWA</h2>

            <table align="center" width="70%" cellpadding="10">
               {{-- <thead > --}}
                  <tr style="background: #3555e2; color: white">
                     <th align="center">No</th>
                     <th align="center">Nama</th>
                     <th align="center">Kelas</th>
                  </tr>
               {{-- </thead> --}}
               {{-- <tbody> --}}
                  @foreach ($data_mahasiswa as $key => $mahasiswa)
                     <tr>
                        <td align="center">{{ ++$key }}. </td>
                        <td align="center">{{ $mahasiswa->nama }}</td>
                        <td align="center">{{ $mahasiswa->kelas }}</td>
                     </tr>
                  @endforeach
               {{-- </tbody> --}}
            </table>

            <div class="page-break"></div>

            <h2 style="text-align: center; margin-top: 30px">MATA KULIAH</h2>

            <table align="center" width="70%" cellpadding="10">
               {{-- <thead > --}}
                  <tr style="background: #3555e2; color: white">
                     <th align="center">No</th>
                     <th align="center">Nama</th>
                     <th align="center">Status</th>
                  </tr>
               {{-- </thead> --}}
               {{-- <tbody> --}}
                  @foreach ($data_mata_kuliah as $key => $mata_kuliah)
                     <tr>
                        <td align="center">{{ ++$key }}. </td>
                        <td align="center">{{ $mata_kuliah->nama }}</td>
                        <td align="center" style="{{ $mata_kuliah->status == "INACTIVE" ? 'color: red; font-weight:bolder' : null }}">
                           {{ $mata_kuliah->status }}
                        </td>
                     </tr>
                  @endforeach
               {{-- </tbody> --}}
            </table>
            
            <div class="page-break"></div>

            <h2 style="text-align: center; margin-top: 30px">MAHASISWA MENGAMBIL MATA KULIAH</h2>

            <table align="center" width="70%" cellpadding="8">
               <thead style="background: #3555e2; color: white">
                  <tr>
                     <th align="center">No</th>
                     <th align="center">Nama</th>
                     <th align="center">Kelas</th>
                     <th align="center">Mata Kuliah Diambil</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($data_mahasiswa_matakuliah as $key => $mahasiswa_matakuliah)
                     <tr>
                        <td align="center">{{ ++$key }}. </td>
                        <td align="center">{{ $mahasiswa_matakuliah->nama }}</td>
                        <td align="center">{{ $mahasiswa_matakuliah->kelas }}</td>
                        <td align="center">
                           <ul style="list-style-type:disc;">
                              @foreach ($mahasiswa_matakuliah->mata_kuliah as $mata_kuliah)
                                 <li>{{ $mata_kuliah->nama }}</li>
                              @endforeach
                           </ul>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>

</body>
</html>