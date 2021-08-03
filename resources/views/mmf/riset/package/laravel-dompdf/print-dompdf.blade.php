<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="{{ asset('vendors/bootstrap-4.5.3/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
   
   <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
   <title>Document</title>
</head>
<body>
   <div class="container mt-3">
      <div class="row justify-content-center">
         <div class="col-md-10 ">
            <h3 class="text-center">Ini Judul untuk print data mahasiswa</h3>

            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Kelas</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($mahasiswas as $key => $mahasiswa)
                     <tr>
                        <td>{{ ++$key }}. </td>
                        <td>Melkan</td>
                        <td>MI-3A</td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>

</body>
</html>