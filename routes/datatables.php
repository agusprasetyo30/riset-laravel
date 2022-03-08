<?php
   Route::name('datatables.')->group(function () {

      Route::group([

         'prefix'    => 'datatables',
         'namespace' => 'Riset\Memfis\Datatables',

      ], function () {
         
         Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa.index');
         Route::post('/mahasiswa', 'MahasiswaController@store')->name('mahasiswa.store');
         Route::get('/mahasiswa/{mahasiswa}/edit', 'MahasiswaController@edit')->name('mahasiswa.edit');
         Route::put('/mahasiswa/{mahasiswa}', 'MahasiswaController@update')->name('mahasiswa.update');
         Route::delete('/mahasiswa/{mahasiswa}', 'MahasiswaController@destroy')->name('mahasiswa.destroy');
      });

   });
?>