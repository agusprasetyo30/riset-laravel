<img src="/index.png" width="100%">

-----

# Riset Laravel

## List Riset

- Convert excel + Bulks file excel [X]
- API Laravel Auth (Rest API tapi tidak menggunakan <b>Passport ataupun Sanctum</b>) [ X ]
- Barcode/qrcode [X]
- Socket laravel [ ]
- Authentification Sosialite [ ]
- Chatbot [ ] (?)

## Step by step

- Convert excel + Bulks file excel
  
  __EXPORT__
  - Install `maatwebsite/excel`
  - membuat folder `Exports` untuk menampung file untuk kebutuhan `Export excel` dan menambahkan file class kedalam folder tersebut sesuai kebutuhan 
  - menambahkan konfigurasi kedalam `config/app.php` sesuai dengan kebutuhan dan menjalankan `php artisan vendor:publish` [ [Refrensi](https://docs.laravel-excel.com/3.0/getting-started/installation.html#installation-2) ]
  - Terdapat 3 metode export excel yaitu : 
    - Collection : Export data excel dengan data tidak terlalu banyak/standart
    - Query : Export data excel untuk data yang banyak/big data
    - View : Export data excel menggunakan VIEW tabel pada halaman
  - Mengatur route untuk memanggil controller tersebut
  - Mengatur controller dengan memanggil fungsi/class yang sudah dibuat pada `app/Exports`
  <br>
  
  __IMPORT__

  - membuat folder `Imports` untuk menampung file untuk kebutuhan `Import excel` dan menambahkan file class kedalam folder tersebut sesuai kebutuhan
  - Mengatur controller untuk memanggil fungsi didalam `Imports` untuk mengatur import excel [ dapat dilihat pada : `BulkExcelController@importFileExcel`]
  - Mengatur `route` dan `view` untuk import


- API Laravel Auth (Rest API tapi tidak menggunakan <b>Passport ataupun Sanctum</b>)
  - Jika ingin login, maka mengakses route API login pada body request tersebut
    <img src="./body postman.png" width="100%">
  
  - Setelah selesai, maka mengambil data <b>TOKEN</b> pada tabel <b>users</b>, deengan memasukan <b>authorization Bearer <`TOKEN`></b>. Jangan lupa arahkan ke route yang merupakan <b>Middleware</b> / ['middleware' => 'auth:api']
    <img src="./header postman.png" width="100%">

  - Ketika sudah maka akses route yang terdapat data, pada contoh ini saya mengakses route <b>localhost::8000/api/todos</b>
    <img src="./get request.png" width="100%">


# Refrensi
  - Import & Export Excel
    - Import
      - [https://daengweb.id/membuat-laporan-laravel-excel-30](https://daengweb.id/membuat-laporan-laravel-excel-30)
    - Export
      - [https://daengweb.id/membuat-fitur-bulk-import-laravel-excel-31](https://daengweb.id/membuat-fitur-bulk-import-laravel-excel-31)

  - Laravel API
    - [https://github.com/andrecastelo/example-api](https://github.com/andrecastelo/example-api) - API
    - [https://www.toptal.com/laravel/restful-laravel-api-tutorial](https://www.toptal.com/laravel/restful-laravel-api-tutorial) - API
    - [https://medium.com/modulr/create-api-authentication-with-passport-of-laravel-5-6-1dc2d400a7f](https://medium.com/modulr/create-api-authentication-with-passport-of-laravel-5-6-1dc2d400a7f) - Laravel Passport

  - Laravel Barcode
    - [https://laravelarticle.com/laravel-barcode-tutorial?fbclid=IwAR2vOZ4Dv2YA97DwQ0ILSwSDeCLaiJMI4DGNosuwRzaOPEdw3RiVtELfcJM](https://laravelarticle.com/laravel-barcode-tutorial?fbclid=IwAR2vOZ4Dv2YA97DwQ0ILSwSDeCLaiJMI4DGNosuwRzaOPEdw3RiVtELfcJM)
  
# Package Use

- [Laravel Excel](https://docs.laravel-excel.com/3.0/getting-started/installation.html#installation-2) - Untuk import dan export excel
- [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper) - Package ini untuk menyediakan pelengkapan/autocomplete data otomatis yang akurat. Pembuatan dilakukan berdasarkan file-file di proyek Anda, sehingga mereka selalu up-to-date.
- [Laravel Passport](https://github.com/laravel/passport) - Untuk Otorisasi authentifikasi API
- [Laravel Custom ID Generator](https://laravelarticle.com/laravel-custom-id-generator) - Digunakan untuk mengenerate ID Increment secara costum
- [Laravel Barcode](https://github.com/milon/barcode) - Digunakan untuk package barcode untuk laravel
- [Captcha For Laravel](https://github.com/mewebstudio/captcha) - Digunakan untuk menambahkan captcha pada laravel