<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>

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

      .judul {
         width: 100%;
         margin: 0;
         padding: 25px;
         text-align: center;
         font-size: 30px;
      }

      .background-biru {
         background: #3555e2;
         color: white;
         margin-bottom: 20px;
      }
   </style>
</head>
<body>
   <div class="background-biru">
      <h2 class="judul">Mahasiswa</h2>
   </div>

      <table align="center" width="70%" cellpadding="10">
         {{-- <thead > --}}
            <tr style="background: #3555e2; color: white">
               <th align="center">No</th>
               <th align="center">Nama</th>
               <th align="center">Kelas</th>
            </tr>
            <tr>
               <td>1. </td>
               <td>Melkan</td>
               <td>Mi-3A</td>
            </tr>
         {{-- </thead> --}}
         {{-- <tbody> --}}
            {{-- @foreach ($data_mahasiswa as $key => $mahasiswa)
               <tr>
                  <td align="center">{{ ++$key }}. </td>
                  <td align="center">{{ $mahasiswa->nama }}</td>
                  <td align="center">{{ $mahasiswa->kelas }}</td>
               </tr>
            @endforeach --}}
         {{-- </tbody> --}}
      </table>
</body>
</html>