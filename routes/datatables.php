<?php
   Route::name('datatables.')->group(function () {

      Route::group([

         'prefix'    => 'datatables',
         'namespace' => 'Datatables',

      ], function () {
         
         Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa.index');
         Route::get('/mahasiswa/{mahasiswa}/edit', 'MahasiswaController@edit')->name('mahasiswa.edit');

      });

   });
?>