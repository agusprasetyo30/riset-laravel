# Riset Laravel

<img src="/index.png" width="100%">

-----

## Tahapan membuat project
1. Membuat project dengan cara `composer create-project --prefer-dist laravel/laravel nama_project`
2. Membuat dan menginstall `laravel/ui` untuk konfigurasi authetifikasi dengan cara `composer require laravel/ui`

## List Riset

- Convert excel + Bulks file excel [X]
- API Laravel [ ]
- Socket laravel [ ]
- Barcode/qrcode [ ]
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

# Package Use

- [Laravel Excel](https://docs.laravel-excel.com/3.0/getting-started/installation.html#installation-2)
