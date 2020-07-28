# Riset Laravel

## Tahapan membuat project
1. Membuat project dengan cara `composer create-project --prefer-dist laravel/laravel nama_project`
2. Membuat dan menginstall `laravel/ui` untuk konfigurasi authetifikasi dengan cara `composer require laravel/ui`

## List Riset

- Convert excel + Bulks file excel [ ]
- API Laravel [ ]
- Socket laravel [ ]
- Barcode/qrcode [ ]
- Authentification Sosialite [ ]
- Chatbot [ ] (?)

## Step by step

- Convert excel + Bulks file excel
  __EXPORT__
  - Install `maatwebsite/excel`
  - membuat folder `Exports` untuk menampung file untuk kebutuhan Export excel dan memasukan file kedalam `config/app.php` sesuai dengan kebutuhan dan menjalankan `php artisan vendor:publish` [ [Refrensi](https://docs.laravel-excel.com/3.0/getting-started/installation.html#installation-2) ]
  - Terdapat 3 metode export excel yaitu : 
    - Collection : Export data excel dengan data tidak terlalu banyak/standart
    - Query : Export data excel untuk data yang banyak/big data
    - View : Export data excel menggunakan VIEW tabel pada halaman
  - Mengatur route untuk memanggil controller tersebut
  - Mengatur controller dengan memanggil fungsi/class yang sudah dibuat pada `app/Exports`

  __IMPORT__
  - 

# Package Use

- [composer require maatwebsite/excel](https://docs.laravel-excel.com/3.0/getting-started/installation.html)
- [Laravel Excel](https://docs.laravel-excel.com/3.0/getting-started/installation.html#installation-2)
