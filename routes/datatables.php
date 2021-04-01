<?php
   Route::name('datatables.')->group(function () {

      Route::group([

         'prefix'    => 'datatables',
         'namespace' => 'Datatables',

      ], function () {
         
         Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa');

      });

   });
?>