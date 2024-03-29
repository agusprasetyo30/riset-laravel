<?php

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

Route::group(['prefix' => 'test', 'as' => 'test.'], function() 
{

    Route::prefix('toko')->name('toko.')->group(function() {
        Route::get('/', function() {
            return view('toko::dashboard');
        })->name('dashboard');

        /*** Category ***/
        Route::resource('category', 'CategoryController')
            ->except(['show', 'destroy']);
        
        Route::get('category/{id}/delete', 'CategoryController@destroy')->name('category.destroy');

        /*** Item ***/
        Route::resource('item', 'ItemController')
            ->except(['show', 'destroy']);
        Route::get('item/{id}/delete', 'ItemController@destroy')
            ->name('item.destroy');
        
        Route::group(['prefix' => 'item', 'as' => 'item.'], function() {
            Route::get('{id}/add-category', 'ItemController@addItemCategory')
                ->name('add-item-category-index');

            Route::post('{id}/add-category', 'ItemController@saveItemCategory')
                ->name('save-item-category');

            Route::get('{id_item}/delete-category/{id_category}', 'ItemController@deleteItemCategory')
                ->name('delete-item-category');
        });
        // Route::get('')

    });
});
