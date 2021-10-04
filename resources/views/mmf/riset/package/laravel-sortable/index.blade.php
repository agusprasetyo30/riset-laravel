<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>spatie/laravel-sortable</title>

   <style>
      body {
         font-family: Arial, Helvetica, sans-serif;
      }

      .container {
         display: flex;
         justify-content: center;
         align-items: center;
      }

   .child {
      width: 500px;
      height: 150px;
      /* background-color: red; */

      position: absolute;
      top: 50%;
      left: 50%;
      margin: -75px 0 0 -250px; 
   }

   p.title {
      text-align: justify;
   }

   .kembali {
      text-decoration: none;
      background: #d4e023;
      color: black;
      padding: 10px;
      border-radius: 5px;
   }

   .kembali:hover {
      transition: 0.2s all;
      background: #acb43d;
      color: black;
   }
   </style>
</head>
<body>
   <div class="container">
      <div class="child">
         <p class="title">
            Untuk <b>spatie/laravel-sortable</b> sebenarnya berhasil untuk diimplementasikan ke dalam Sistem/program akan tetapi terkendala pada saat menambahkan data baru. 
            jika menambahkan data baru secara otomatis kolom/data yang diinisialisasi bernilai <b>1</b> sesuai dengan konfigurasi modelnya
         </p>

         <a class="kembali" href="{{ route('riset-memfis') }}">Kembali</a>

      </div>
   </div>
</body>
</html>