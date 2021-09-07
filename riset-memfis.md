<img src="/riset-memfis.jpg" width="100%">

-----

# Riset MeMFIS

## List Riset

### Riset Fitur Laravel

- Policy/Policies                   [ ]
- Form Request + Fungsinya          [X]
- Penerapan Polimorfisme            [X]
  ```
  Pada kasus ini menggunakan kasus 
    * One to Many
      - Video
      - Post
      - Comment

      ex: 
      Pada kasus ini `Video` dan `Post` dapat menambahkan komentar/Comment

    * Many to Many
      - Video
      - Post
      - Tag

      ex:
      Pada kasus ini `Video` dan `Post` dapat menambahkan `Tag` sesuai keinginan, dan sebaliknya `Tag` memiliki beberapa `Video` dan `Post`
  ```
- ScopeOf... (Builder)              [X]
  > Implementasinya di input Mahasiswa dengan filter berdasarkan Gender
- stdClass [ ]

### Riset Package/Library

- nwidart/laravel-modules           [X]
  > Modul ini digunakan untuk mengelola aplikasi yang lebih besar menggunakan modul yang terpisah. Didalam modul ini terdiri dari beberapa tampilan (view), pengontrol (Controller), dan model
- owen-it/laravel-auditing          [X]
  > Modul ini yang digunakan untuk audit dan menampilkan history dan riwayat perubahan model yang terjadi
- spatie/laravel-sortable           [ ]
  > Modul ini digunakan untuk . . .
- spatie/laravel-activity-log       [ ]
  > Modul ini digunakan untuk . . .
- spatie/laravel-backup             [ ]
  > Modul ini digunakan untuk . . .
- spatie/laravel-query-builder      [X]
  > Package ini memungkinkan untuk `filter`, `sorting`, dan include `eloquent relations` yang berdasarkan permintaan/request. `QueryBuilder` yang digunakan dalam package ini untuk memperluas/`extends` default `laravel eloquent builder`
- spatie/laravel-slugable           [ ]
  > Modul ini digunakan untuk . . .
- spatie/laravel-tags               [ ]
  > Modul ini digunakan untuk . . .
- yajra/laravel-datatables-oracle   [X]
  > Digunakan untuk meriset datatable yang digunakan pada MeMFIS
- flynsarmy/csv-seeder              [ ]
  > Modul ini digunakan untuk . . .
- barryvdh/laravel-dompdf & iio/libmergepdf [ ]
  > Modul ini digunakan untuk membuat print PDF dan DOMpdf. Selain itu juga mengkonfigurasi/merge file pdf
- league/flysystem-aws-s3-v3        [ ]
  > Modul ini digunakan untuk . . .

## Refrensi Tutorial

- Riset Fitur Laravel
  - Policy/Policies
    - ...
  - Form Request + Fungsinya
    - [https://protone.media/en/blog/working-with-the-validator-instance-in-form-requests](https://protone.media/en/blog/working-with-the-validator-instance-in-form-requests)
    - [https://www.apphp.com/tutorials/index.php?page=laravel-creating-custom-form-request](https://www.apphp.com/tutorials/index.php?page=laravel-creating-custom-form-request)
  - Penerapan Polimorfisme
    - [https://appdividend.com/2018/05/18/laravel-polymorphic-relationship-tutorial-example/](https://appdividend.com/2018/05/18/laravel-polymorphic-relationship-tutorial-example/)
    - [https://dev.to/ellis22/learn-laravel-polymorphic-relationship-step-by-step-with-example-3pe3](https://dev.to/ellis22/learn-laravel-polymorphic-relationship-step-by-step-with-example-3pe3)
    - [https://www.nicesnippets.com/blog/laravel-one-to-many-polymorphic-eloquent-relationship-example](https://www.nicesnippets.com/blog/laravel-one-to-many-polymorphic-eloquent-relationship-example)
    - [https://laracasts.com/discuss/channels/eloquent/remove-many-to-many-polymorphic-relations-taggables](https://laracasts.com/discuss/channels/eloquent/remove-many-to-many-polymorphic-relations-taggables)
    - [https://www.itsolutionstuff.com/post/laravel-one-to-many-polymorphic-relationship-tutorialexample.html](https://www.itsolutionstuff.com/post/laravel-one-to-many-polymorphic-relationship-tutorialexample.html)
  - ScopeOf
    - [https://medium.com/@janaksan_/using-scope-with-laravel-7c80dd6a2c3d](https://medium.com/@janaksan_/using-scope-with-laravel-7c80dd6a2c3d)
    - [https://www.larashout.com/using-scopes-in-laravel](https://www.larashout.com/using-scopes-in-laravel)
    - [https://elishaukpongson.medium.com/laravel-scope-an-introduction-87ec5acc39e](https://elishaukpongson.medium.com/laravel-scope-an-introduction-87ec5acc39e)
    - [https://laravel.com/docs/5.6/eloquent#query-scopes](https://laravel.com/docs/5.6/eloquent#query-scopes)
  - stdClass
    - ...

<br>

- Riset Package/Library
  - nwidart/laravel-modules
    - [https://medium.com/@destinyajax/how-to-build-modular-applications-in-laravel-the-plug-n-play-approach-part-1-13a87f7de06](https://medium.com/@destinyajax/how-to-build-modular-applications-in-laravel-the-plug-n-play-approach-part-1-13a87f7de06)
    - [https://www.ayongoding.com/menggunakan-laravel-modules/](https://www.ayongoding.com/menggunakan-laravel-modules/)
    - [https://nwidart.com/laravel-modules/v6/introduction](https://nwidart.com/laravel-modules/v6/introduction)
  - owen-it/laravel-auditing
    - [http://www.laravel-auditing.com/](http://www.laravel-auditing.com/)
    - [https://www.youtube.com/watch?v=kxBRJvxx05Q](https://www.youtube.com/watch?v=kxBRJvxx05Q)
    - [https://laracasts.com/discuss/channels/laravel/audit-with-laravel-auditing](https://laracasts.com/discuss/channels/laravel/audit-with-laravel-auditing)
  - spatie/laravel-sortable 
    - ...
  - spatie/laravel-activity-log(belum)
    - [https://github.com/spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog)
    - [https://spatie.be/docs/laravel-activitylog/v4/introduction](https://spatie.be/docs/laravel-activitylog/v4/introduction)
    - [https://www.youtube.com/c/Bitfumes/search?query=activity%20log](https://www.youtube.com/c/Bitfumes/search?query=activity%20log)
  - spatie/laravel-backup
    - [https://dev.to/ellis22/how-to-backup-laravel-files-and-database-3ehb](https://dev.to/ellis22/how-to-backup-laravel-files-and-database-3ehb)
  - spatie/laravel-query-builder
    - [https://spatie.be/docs/laravel-query-builder/v3/introduction](https://spatie.be/docs/laravel-query-builder/v3/introduction)
    - [https://www.larablocks.com/package/spatie/laravel-query-builder](https://www.larablocks.com/package/spatie/laravel-query-builder)
    - [https://laracasts.com/discuss/channels/laravel/spatie-laravel-query-builder](https://laracasts.com/discuss/channels/laravel/spatie-laravel-query-builder)
  - spatie/laravel-slugable 
    - ...
  - spatie/laravel-tags
    - ...
  - yajra/laravel-datatables-oracle
    - [https://datatables.yajrabox.com/](https://datatables.yajrabox.com/)
    - [https://stackoverflow.com/questions/31580366/jquery-datatables-hide-show-entries-text-but-show-the-dropdown-list](https://stackoverflow.com/questions/31580366/jquery-datatables-hide-show-entries-text-but-show-the-dropdown-list)
    - [https://laravel-news.com/laravel-optional-helper](https://laravel-news.com/laravel-optional-helper)
    - [http://live.datatables.net/kihecona/1/edit](http://live.datatables.net/kihecona/1/edit)
    - Riset dan implementasi dari source code memfis
  - flynsarmy/csv-seeder
    - ...
  - barryvdh/laravel-dompdf & iio/libmergepdf (Untuk merge file pdf ex: potrait & landscape)
    - [https://github.com/dompdf/dompdf](https://github.com/dompdf/dompdf)
    - [http://eclecticgeek.com/dompdf/debug.php](http://eclecticgeek.com/dompdf/debug.php) => Untuk debug dompdf
    - [https://github.com/barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf)
    - [https://www.remotestack.io/how-to-generate-pdf-file-in-laravel-with-dompdf/](https://www.remotestack.io/how-to-generate-pdf-file-in-laravel-with-dompdf/)
    - [https://www.malasngoding.com/membuat-laporan-pdf-dengan-dompdf-laravel/](https://www.malasngoding.com/membuat-laporan-pdf-dengan-dompdf-laravel/)
    - [https://solutech.id/2019/07/17/cara-membuat-report-pdf-dengan-dompdf-pada-laravel/](https://solutech.id/2019/07/17/cara-membuat-report-pdf-dengan-dompdf-pada-laravel/)
    - [https://github.com/hanneskod/libmergepdf](https://github.com/hanneskod/libmergepdf) => [ merge PDF ]
    - [https://laracasts.com/discuss/channels/laravel/merging-pdf-files](https://laracasts.com/discuss/channels/laravel/merging-pdf-files)
    - [http://www.muslimaswaja.id/2020/08/multiorientasi-di-dompdf-bisakah.html](http://www.muslimaswaja.id/2020/08/multiorientasi-di-dompdf-bisakah.html)
    - [https://stackoverflow.com/questions/36012174/dompdf-page-orientation-both-landscape-and-portrait](https://stackoverflow.com/questions/36012174/dompdf-page-orientation-both-landscape-and-portrait)
    - ...
    - ...
  - league/flysystem-aws-s3-v3
    - ...