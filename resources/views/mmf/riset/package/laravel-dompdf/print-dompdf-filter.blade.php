<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <title>Mahasiswa {{ Request::get('kelas') }}</title>
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
            
            @if (Request::get('kelas'))
               <h2 style="text-align: center">[ {{ Request::get('kelas') }} ]</h2>
            @endif

            <!-- Digunakan untuk filter berdasarkan KELAS -->
            @if (Request::get('kelas'))
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
                           <td align="">{{ $mahasiswa->nama }}</td>
                           <td align="center">{{ $mahasiswa->kelas }}</td>
                        </tr>
                     @endforeach
                  {{-- </tbody> --}}
               </table>

               <h2 style="text-align: center; margin-top: 30px">MAHASISWA MENGAMBIL MATA KULIAH</h2>

               <table align="center" width="70%" cellpadding="10">
                  <thead >
                     <tr style="background: #3555e2; color: white">
                        <th align="center" width=10%>No</th>
                        <th align="center" width=50%>Nama</th>
                        <th align="center" width=40%>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($data_mahasiswa as $key => $mahasiswa)
                        <tr>
                           <td>{{ ++$key }}.</td>
                           <td>{{ $mahasiswa->nama }}</td>
                           <td>
                              <ul>
                                 @foreach ($mahasiswa->mata_kuliah as $mata_kuliah)
                                    <li>{{ $mata_kuliah->nama }}</li>
                                 @endforeach
                              </ul>

                              @if($mahasiswa->mata_kuliah->isEmpty())
                                 <div style="text-align: center">
                                    -
                                 </div>
                              @endif
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            @endif

            <!-- Digunakan untuk filter berdasarkan MAHASISWA -->
            @if (Request::get('mahasiswa'))
               <table align="center" width="70%" cellpadding="10">
                     <tr style="background: #3555e2; color: white">
                        <th align="center">No</th>
                        <th align="center">Nama</th>
                        <th align="center">Kelas</th>
                     </tr>

                     <tr>
                        <td align="center">1. </td>
                        <td align="">{{ $data_mahasiswa->nama }}</td>
                        <td align="center">{{ $data_mahasiswa->kelas }}</td>
                     </tr>
               </table>

               <h2 style="text-align: center; margin-top: 30px">MATA KULIAH YANG DIAMBIL</h2>
               
               <table align="center" width="70%" cellpadding="10">
                  <thead >
                     <tr style="background: #3555e2; color: white">
                        <th align="center" width=10%>No</th>
                        <th align="center" width=50%>Nama</th>
                        <th align="center" width=40%>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($data_mahasiswa->mata_kuliah as $key => $mata_kuliah)
                        <tr>
                           <td>{{ ++$key }}. </td>
                           <td>{{ $mata_kuliah->nama }}</td>
                           <td>{{ $mata_kuliah->status }}</td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            @endif

         </div>
      </div>
   </div>

</body>
</html>