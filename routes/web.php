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
Route::group(['prefix' => 'dummy-todo', 'as' => 'dummy.'], function () {
    Route::get('/', 'TodoController@index')->name('index');
    Route::get('/delete', 'TodoController@destroy')->name('delete');

    Route::post('/', 'TodoController@store')->name('store');
    Route::put('/{id}/update', 'TodoController@update')->name('update');
});

// Bulk Excel
Route::group(['prefix' => 'bulk-excel', 'as' => 'excel.'], function () {
    Route::get('/', 'BulkExcelController@index')->name('index');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
