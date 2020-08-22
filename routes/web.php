<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dummy Todo
Route::group(['prefix' => 'dummy_todo', 'as' => 'dummy.'], function () {
    Route::get('/', 'TodoController@index')->name('index');
    Route::get('/delete', 'TodoController@destroy')->name('delete');

    Route::post('/', 'TodoController@store')->name('store');
    Route::put('/{id}/update', 'TodoController@update')->name('update');
});

// Bulk Excel
Route::group(['prefix' => 'bulk_excel', 'as' => 'excel.'], function () {
    Route::get('/', 'BulkExcelController@index')->name('index');
    
    // Export
    Route::get('/print_collection', 'BulkExcelController@printExcelCollection')->name('print.collection');
    Route::get('/print_query', 'BulkExcelController@printExcelQuery')->name('print.query');
    Route::get('/print_view', 'BulkExcelController@printExcelView')->name('print.view');

    // Import
    Route::get('/import', 'BulkExcelController@importPage')->name('print.import-page');
    Route::post('/import', 'BulkExcelController@importFileExcel')->name('print.import');

});

Route::group(['prefix' => 'data-api', 'as' => 'data-api.'], function () {
    Route::get('/', 'TodoApiController@indexPage')->name('index');
});


Route::group(['prefix' => 'barcode-qr', 'as' => 'barcode-qr.'], function () {
    
    Route::get('/', 'BarcodeQrController@index')->name('index');
    Route::get('/todo-barcode/{id}', 'BarcodeQrController@getTodoByID')->name('barcode-id');


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
